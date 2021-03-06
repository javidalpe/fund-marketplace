<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Repositories\FundRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;

class FundController extends AppBaseController
{
    /** @var  FundRepository */
    private $fundRepository;

    public function __construct(FundRepository $fundRepo)
    {
        $this->fundRepository = $fundRepo;
    }

    /**
     * Display a listing of the Fund.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fundRepository->pushCriteria(new RequestCriteria($request));

        $user = Auth::user();
        if ($user->isManager()) {
            $funds = $user->funds;
        } else {
            $funds = $user->clubs;
        }

        return view('funds.index')
            ->with('funds', $funds);
    }

    /**
     * Show the form for creating a new Fund.
     *
     * @return Response
     */
    public function create()
    {
        return view('funds.create');
    }

    /**
     * Store a newly created Fund in storage.
     *
     * @param CreateFundRequest $request
     *
     * @return Response
     */
    public function store(CreateFundRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $fund = $this->fundRepository->create($input);

        Flash::success('Fund saved successfully.');

        return redirect(route('funds.index'));
    }

    /**
     * Display the specified Fund.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        $users = User::investor()->get();

        $data = [
            'fund' => $fund,
            'users' => $fund->users,
            'fees' => $fund->fees()->orderBy('from')->get(),
            'investors' => array_pluck($users, 'name', 'id'),
        ];

        return view('funds.show', $data);
    }

    /**
     * Show the form for editing the specified Fund.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        return view('funds.edit')->with('fund', $fund);
    }

    /**
     * Update the specified Fund in storage.
     *
     * @param  int              $id
     * @param UpdateFundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFundRequest $request)
    {
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        $fund = $this->fundRepository->update($request->all(), $id);

        Flash::success('Fund updated successfully.');

        return redirect(route('funds.index'));
    }

    /**
     * Remove the specified Fund from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fund = $this->fundRepository->findWithoutFail($id);

        if (empty($fund)) {
            Flash::error('Fund not found');

            return redirect(route('funds.index'));
        }

        $this->fundRepository->delete($id);

        Flash::success('Fund deleted successfully.');

        return redirect(route('funds.index'));
    }
}
