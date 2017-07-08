<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Repositories\BidRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Offer;
use App\Models\Bid;
use App\User;
use Auth;

class BidController extends AppBaseController
{
    /** @var  BidRepository */
    private $bidRepository;

    public function __construct(BidRepository $bidRepo)
    {
        $this->bidRepository = $bidRepo;
    }

    /**
     * Display a listing of the Bid.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bidRepository->pushCriteria(new RequestCriteria($request));
        $user = Auth::user();
        if ($user->isManager()) {
            $offers = Offer::where('status', Offer::STATUS_CREATED)->whereIn('vehicle_id', array_pluck($user->vehicles, 'id'))->get();
            $bids = $this->bidRepository->findWhereIn('offer_id', array_pluck($offers, 'id'));
        } else {
            $bids = $user->bids;
        }

        return view('bids.index')
            ->with('bids', $bids);
    }

    /**
     * Show the form for creating a new Bid.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->isManager()) {
            $offers = Offer::where('status', Offer::STATUS_CREATED)->whereIn('vehicle_id', array_pluck($user->vehicles, 'id'))->get();
            $users = User::investor()->get();
        } else {
            $offers = Offer::where('user_id', '!=', $user->id)->where('status', Offer::STATUS_CREATED)->whereIn('vehicle_id', array_pluck($user->vehicles, 'id'))->get();
            $users = [$user];
        }

        $data = array(
            'offers' => array_pluck($offers, 'id', 'id'),
            'investors' => array_pluck($users, 'name', 'id')
        );

        return view('bids.create', $data);
    }

    /**
     * Store a newly created Bid in storage.
     *
     * @param CreateBidRequest $request
     *
     * @return Response
     */
    public function store(CreateBidRequest $request)
    {
        $input = $request->all();
        $input['status'] = Bid::STATUS_CREATED;
        $input['buy_fee'] = ($request->amount * $request->stock_price) * config('app.buy_fee');
        $bid = $this->bidRepository->create($input);

        Flash::success('Bid saved successfully.');

        return redirect(route('bids.index'));
    }

    /**
     * Display the specified Bid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bid = $this->bidRepository->findWithoutFail($id);

        if (empty($bid)) {
            Flash::error('Bid not found');

            return redirect(route('bids.index'));
        }

        return view('bids.show')->with('bid', $bid);
    }

    /**
     * Show the form for editing the specified Bid.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bid = $this->bidRepository->findWithoutFail($id);

        if (empty($bid)) {
            Flash::error('Bid not found');

            return redirect(route('bids.index'));
        }

        return view('bids.edit')->with('bid', $bid);
    }

    /**
     * Update the specified Bid in storage.
     *
     * @param  int              $id
     * @param UpdateBidRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBidRequest $request)
    {
        $bid = $this->bidRepository->findWithoutFail($id);

        if (empty($bid)) {
            Flash::error('Bid not found');

            return redirect(route('bids.index'));
        }

        $bid = $this->bidRepository->update($request->all(), $id);

        Flash::success('Bid updated successfully.');

        return redirect(route('bids.index'));
    }

    /**
     * Remove the specified Bid from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bid = $this->bidRepository->findWithoutFail($id);

        if (empty($bid)) {
            Flash::error('Bid not found');

            return redirect(route('bids.index'));
        }

        $this->bidRepository->delete($id);

        Flash::success('Bid deleted successfully.');

        return redirect(route('bids.index'));
    }
}
