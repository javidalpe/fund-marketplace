<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Repositories\OfferRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\User;
use App\Models\Offer;

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
            $offers = $user->operations()->with('user')->with('vehicle')->get();
        }

        return view('offers.index')
            ->with('offers', $offers);
    }

    /**
     * Show the form for creating a new Offer.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->isManager()) {
            $vehicles = $user->vehicles;
            $users = User::investor()->get();
        } else {
            $vehicles = $user->companies()->get();
            $users = [$user];
        }

        $data = array(
            'vehicles' => array_pluck($vehicles, 'name', 'id'),
            'investors' => array_pluck($users, 'name', 'id')
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
        $input = $request->all();

        $input['status'] = Offer::STATUS_CREATED;
        $input['sell_fee'] = ($request->amount * $request->stock_price) * config('app.sell_fee');

        $offer = $this->offerRepository->create($input);

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

        return view('offers.show')->with('offer', $offer);
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

        $this->offerRepository->delete($id);

        Flash::success('Offer deleted successfully.');

        return redirect(route('offers.index'));
    }
}
