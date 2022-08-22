<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTruckTypeRequest;
use App\Http\Requests\UpdateTruckTypeRequest;
use App\Repositories\TruckTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TruckTypeController extends AppBaseController
{
    /** @var  TruckTypeRepository */
    private $truckTypeRepository;

    public function __construct(TruckTypeRepository $truckTypeRepo)
    {
        $this->truckTypeRepository = $truckTypeRepo;
    }

    /**
     * Display a listing of the TruckType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $truckTypes = $this->truckTypeRepository->all();

        return view('truck_types.index')
            ->with('truckTypes', $truckTypes);
    }

    /**
     * Show the form for creating a new TruckType.
     *
     * @return Response
     */
    public function create()
    {
        return view('truck_types.create');
    }

    /**
     * Store a newly created TruckType in storage.
     *
     * @param CreateTruckTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTruckTypeRequest $request)
    {
        $input = $request->all();

        $truckType = $this->truckTypeRepository->create($input);

        Flash::success('Truck Type saved successfully.');

        return redirect(route('truckTypes.index'));
    }

    /**
     * Display the specified TruckType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            Flash::error('Truck Type not found');

            return redirect(route('truckTypes.index'));
        }

        return view('truck_types.show')->with('truckType', $truckType);
    }

    /**
     * Show the form for editing the specified TruckType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            Flash::error('Truck Type not found');

            return redirect(route('truckTypes.index'));
        }

        return view('truck_types.edit')->with('truckType', $truckType);
    }

    /**
     * Update the specified TruckType in storage.
     *
     * @param int $id
     * @param UpdateTruckTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTruckTypeRequest $request)
    {
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            Flash::error('Truck Type not found');

            return redirect(route('truckTypes.index'));
        }

        $truckType = $this->truckTypeRepository->update($request->all(), $id);

        Flash::success('Truck Type updated successfully.');

        return redirect(route('truckTypes.index'));
    }

    /**
     * Remove the specified TruckType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            Flash::error('Truck Type not found');

            return redirect(route('truckTypes.index'));
        }

        $this->truckTypeRepository->delete($id);

        Flash::success('Truck Type deleted successfully.');

        return redirect(route('truckTypes.index'));
    }
}
