<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOperationRequest;
use App\Http\Requests\UpdateOperationRequest;
use App\Repositories\OperationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\User;

class OperationController extends AppBaseController
{
    /** @var  OperationRepository */
    private $operationRepository;

    public function __construct(OperationRepository $operationRepo)
    {
        $this->operationRepository = $operationRepo;
    }

    /**
     * Display a listing of the Operation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->operationRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        if ($user->isManager()) {
            $operations = $this->operationRepository->with('vehicle')->findWhereIn('vehicle_id', array_pluck(Auth::user()->vehicles, 'id'));
        } else {
            $operations = $user->operations()->with('vehicle')->get();
        }

        return view('operations.index')
            ->with('operations', $operations);
    }

    /**
     * Show the form for creating a new Operation.
     *
     * @return Response
     */
    public function create()
    {
        $vehicles = Auth::user()->vehicles;
        $users = User::investor()->get();
        $data = array(
            'vehicles' => array_pluck($vehicles, 'name', 'id'),
            'investors' => array_pluck($users, 'name', 'id')
        );
        return view('operations.create', $data);
    }

    /**
     * Store a newly created Operation in storage.
     *
     * @param CreateOperationRequest $request
     *
     * @return Response
     */
    public function store(CreateOperationRequest $request)
    {
        $input = $request->all();

        if ($request->amount > 0) {
            $input['type'] = 'Buy';
        } else {
            $input['type'] = 'Sell';
        }

        $operation = $this->operationRepository->create($input);

        Flash::success('Operation saved successfully.');

        return redirect(route('operations.index'));
    }

    /**
     * Display the specified Operation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        return view('operations.show')->with('operation', $operation);
    }

    /**
     * Show the form for editing the specified Operation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        return view('operations.edit')->with('operation', $operation);
    }

    /**
     * Update the specified Operation in storage.
     *
     * @param  int              $id
     * @param UpdateOperationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOperationRequest $request)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        $operation = $this->operationRepository->update($request->all(), $id);

        Flash::success('Operation updated successfully.');

        return redirect(route('operations.index'));
    }

    /**
     * Remove the specified Operation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $operation = $this->operationRepository->findWithoutFail($id);

        if (empty($operation)) {
            Flash::error('Operation not found');

            return redirect(route('operations.index'));
        }

        $this->operationRepository->delete($id);

        Flash::success('Operation deleted successfully.');

        return redirect(route('operations.index'));
    }
}
