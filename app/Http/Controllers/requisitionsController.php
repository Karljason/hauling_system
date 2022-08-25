<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterequisitionsRequest;
use App\Http\Requests\UpdaterequisitionsRequest;
use App\Repositories\requisitionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\SysOfficialNos;


class requisitionsController extends AppBaseController
{
    /** @var  requisitionsRepository */
    private $requisitionsRepository;

    public function __construct(requisitionsRepository $requisitionsRepo)
    {
        $this->requisitionsRepository = $requisitionsRepo;
    }

    /**
     * Display a listing of the requisitions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $requisitions = $this->requisitionsRepository->all();

        return view('requisitions.index')
            ->with('requisitions', $requisitions);
    }

    /**
     * Show the form for creating a new requisitions.
     *
     * @return Response
     */
    public function create()
    {
        // add the current sys_official_nos.requisition_ctrl_no as default vaLue
        // it should be hidden and should also be shown as span in create.blade
        /*
        setting default sys_official_nos.requisition_ctrl_no
        php artisan tinker
        */
        $txtReqCtrlNo = SysOfficialNos::select('requisition_ctrl_no')->limit(1)->get(); 
        $txtReqCtrlNo = $txtReqCtrlNo[0]; 
        $txtReqCtrlNo = $txtReqCtrlNo->requisition_ctrl_no;

        
        return view('requisitions.create')->with('txtReqCtrlNo',  $txtReqCtrlNo);
    }

    /**
     * Store a newly created requisitions in storage.
     *
     * @param CreaterequisitionsRequest $request
     *
     * @return Response
     */
    public function store(CreaterequisitionsRequest $request)
    {
        $input = $request->all();

        $requisitions = $this->requisitionsRepository->create($input);

        Flash::success('Requisitions saved successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Display the specified requisitions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            Flash::error('Requisitions not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.show')->with('requisitions', $requisitions);
    }

    /**
     * Show the form for editing the specified requisitions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisitions = $this->requisitionsRepository->find($id);

        $txtReqCtrlNo = $requisitions->ctrl_no;

        if (empty($requisitions)) {
            Flash::error('Requisitions not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.edit')->with('requisitions', $requisitions)->with('txtReqCtrlNo', $txtReqCtrlNo);
    }

    /**
     * Update the specified requisitions in storage.
     *
     * @param int $id
     * @param UpdaterequisitionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterequisitionsRequest $request)
    {
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            Flash::error('Requisitions not found');

            return redirect(route('requisitions.index'));
        }

        $requisitions = $this->requisitionsRepository->update($request->all(), $id);

        Flash::success('Requisitions updated successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Remove the specified requisitions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            Flash::error('Requisitions not found');

            return redirect(route('requisitions.index'));
        }

        $this->requisitionsRepository->delete($id);

        Flash::success('Requisitions deleted successfully.');

        return redirect(route('requisitions.index'));
    }
}
