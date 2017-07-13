<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Repositories\VehicleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use DB;
use App\Services\FinService;

class VehicleController extends AppBaseController
{
    /** @var  VehicleRepository */
    private $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepo)
    {
        $this->vehicleRepository = $vehicleRepo;
    }

    /**
     * Display a listing of the Vehicle.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->vehicleRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        if ($user->isManager()) {
            $vehicles = $user->vehicles;
        } else {
            $vehicles = $user->companies()->get();
        }

        return view('vehicles.index')
            ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new Vehicle.
     *
     * @return Response
     */
    public function create()
    {
        $funds = Auth::user()->funds;
        $data = array(
            'funds' => array_pluck($funds, 'name', 'id'),
        );
        return view('vehicles.create', $data);
    }

    /**
     * Store a newly created Vehicle in storage.
     *
     * @param CreateVehicleRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleRequest $request)
    {
        $input = $request->all();

        $vehicle = $this->vehicleRepository->create($input);

        Flash::success('Vehicle saved successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified Vehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);
        $vehicle->investors();
        if (empty($vehicle)) {
            Flash::error('Vehicle not found');

            return redirect(route('vehicles.index'));
        }

        $user = Auth::user();

        if ($user->isManager()) {
            $operations = $vehicle->operations;
            $position = false;
            $users = $vehicle->operations()
                    ->select('user_id', DB::raw('SUM(amount) as amount'))
                    ->groupBy('user_id')
                    ->havingRaw('SUM(amount) > 0')
                    ->with('user')
                    ->get();
        } else {
            $operations = $vehicle->operations()->where('user_id', $user->id)->get();
            $stock_amount = $vehicle->operations()->where('user_id', $user->id)->sum('amount');
            $position = FinService::getPositionForOperations($operations, $stock_amount, $vehicle->stock_price);
            $users = [];
        }

        $data = [
            'users' => $users,
            'vehicle' => $vehicle,
            'operations' => $operations,
            'position' => $position,
        ];

        return view('vehicles.show', $data);
    }

    /**
     * Show the form for editing the specified Vehicle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('Vehicle not found');

            return redirect(route('vehicles.index'));
        }

        return view('vehicles.edit')->with('vehicle', $vehicle);
    }

    /**
     * Update the specified Vehicle in storage.
     *
     * @param  int              $id
     * @param UpdateVehicleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleRequest $request)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('Vehicle not found');

            return redirect(route('vehicles.index'));
        }

        $vehicle = $this->vehicleRepository->update($request->all(), $id);

        Flash::success('Vehicle updated successfully.');

        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified Vehicle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $vehicle = $this->vehicleRepository->findWithoutFail($id);

        if (empty($vehicle)) {
            Flash::error('Vehicle not found');

            return redirect(route('vehicles.index'));
        }

        $this->vehicleRepository->delete($id);

        Flash::success('Vehicle deleted successfully.');

        return redirect(route('vehicles.index'));
    }
}
