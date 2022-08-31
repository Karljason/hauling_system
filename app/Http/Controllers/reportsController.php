<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatereportsRequest;
use App\Http\Requests\UpdatereportsRequest;
use App\Repositories\reportsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class reportsController extends AppBaseController
{
    /** @var  reportsRepository */
    private $reportsRepository;

    public function __construct(reportsRepository $reportsRepo)
    {
        $this->reportsRepository = $reportsRepo;
    }

    /**
     * Display a listing of the reports.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reports = $this->reportsRepository->all();

        return view('reports.index')
            ->with('reports', $reports);
    }

    /**
     * Show the form for creating a new reports.
     *
     * @return Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created reports in storage.
     *
     * @param CreatereportsRequest $request
     *
     * @return Response
     */
    public function store(CreatereportsRequest $request)
    {
        $input = $request->all();

        $reports = $this->reportsRepository->create($input);

        Flash::success('Reports saved successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Display the specified reports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            Flash::error('Reports not found');

            return redirect(route('reports.index'));
        }

        return view('reports.show')->with('reports', $reports);
    }

    /**
     * Show the form for editing the specified reports.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            Flash::error('Reports not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with('reports', $reports);
    }

    /**
     * Update the specified reports in storage.
     *
     * @param int $id
     * @param UpdatereportsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereportsRequest $request)
    {
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            Flash::error('Reports not found');

            return redirect(route('reports.index'));
        }

        $reports = $this->reportsRepository->update($request->all(), $id);

        Flash::success('Reports updated successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Remove the specified reports from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            Flash::error('Reports not found');

            return redirect(route('reports.index'));
        }

        $this->reportsRepository->delete($id);

        Flash::success('Reports deleted successfully.');

        return redirect(route('reports.index'));
    }
}
