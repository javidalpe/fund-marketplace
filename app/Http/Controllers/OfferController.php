<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Repositories\OfferRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use App\User;
use App\Models\Offer;
use App\Models\Vehicle;
use App\Events\OfferCreated;

class OfferController extends AppBaseController
{
    /** @var  OfferRepository */
    private $offerRepository;

    public function __construct(OfferRepository $offerRepo)
    {
        $this->offerRepository = $offerRepo;
    }

    /**
     * Display a listing of the Offer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->offerRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        if ($user->isManager()) {
            $offers = $this->offerRepository->with('user')->with('vehicle')->findWhereIn('vehicle_id', array_pluck($user->vehicles, 'id'));
        } else {
            $offers = $user->offersAvailable()->with('user')->with('vehicle')->get();
        }

        return view('offers.index')
            ->with('offers', $offers);
    }

    /**
     * Show the form for creating a new Offer.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->isManager()) {
            $vehicles = $user->vehicles;
            $users = User::investor()->get();
        } else {
            $vehicles = $user->companies()->get();
            $users = [$user];
        }

        $stock_amount = false;
        $stock_price = false;
        if ($request->has('vehicle')) {
            $vehicle = Vehicle::find($request->get('vehicle'));
            $stock_price = $vehicle->stock_price;
            if ($user->isInvestor()) {
                $stock_amount = $vehicle->operations()->where('user_id', $user->id)->sum('amount');
            }
        } else {
            $vehicle = false;
        }

        $data = array(
            'vehicles' => array_pluck($vehicles, 'name', 'id'),
            'vehicle' => $vehicle,
            'investors' => array_pluck($users, 'name', 'id'),
            'stock_amount' => $stock_amount,
            'stock_price' => $stock_price
        );

        return view('offers.create', $data);
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param CreateOfferRequest $request
     *
     * @return Response
     */
    public function store(CreateOfferRequest $request)
    {
        if (!$request->confirm) {
            $vehicle = Vehicle::find($request->vehicle_id);
            $data = [
                'vehicle' => $vehicle
            ];
            return view('offers.confirm', $data);
        }


        $input = $request->all();

        $input['status'] = Offer::STATUS_VEHICLE_PHASE;
        $input['sell_fee'] = ($request->amount * $request->stock_price) * config('app.sell_fee');

        $offer = $this->offerRepository->create($input);

        event(new OfferCreated($offer));

        Flash::success('Offer saved successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Display the specified Offer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $offer = $this->offerRepository->findWithoutFail($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        $data = [
            'offer' => $offer,
            'vehicle' => $offer->vehicle,
            'bids' => $offer->bids()->with('user')->get()
        ];

        return view('offers.show', $data);
    }

    /**
     * Show the form for editing the specified Offer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $offer = $this->offerRepository->findWithoutFail($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        return view('offers.edit')->with('offer', $offer);
    }

    /**
     * Update the specified Offer in storage.
     *
     * @param  int              $id
     * @param UpdateOfferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfferRequest $request)
    {
        $offer = $this->offerRepository->findWithoutFail($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        $offer = $this->offerRepository->update($request->all(), $id);

        Flash::success('Offer updated successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified Offer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $offer = $this->offerRepository->findWithoutFail($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        $offer->bids()->delete();
        $this->offerRepository->delete($id);

        Flash::success('Offer deleted successfully.');

        return redirect(route('offers.index'));
    }
}
