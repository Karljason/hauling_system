<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinventorymainAPIRequest;
use App\Http\Requests\API\UpdateinventorymainAPIRequest;
use App\Models\inventorymain;
use App\Repositories\inventorymainRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class inventorymainController
 * @package App\Http\Controllers\API
 */

class inventorymainAPIController extends AppBaseController
{
    /** @var  inventorymainRepository */
    private $inventorymainRepository;

    public function __construct(inventorymainRepository $inventorymainRepo)
    {
        $this->inventorymainRepository = $inventorymainRepo;
    }

    /**
     * Display a listing of the inventorymain.
     * GET|HEAD /inventorymains
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $inventorymains = $this->inventorymainRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($inventorymains->toArray(), 'Inventorymains retrieved successfully');
    }

    /**
     * Store a newly created inventorymain in storage.
     * POST /inventorymains
     *
     * @param CreateinventorymainAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinventorymainAPIRequest $request)
    {
        $input = $request->all();

        $inventorymain = $this->inventorymainRepository->create($input);

        return $this->sendResponse($inventorymain->toArray(), 'Inventorymain saved successfully');
    }

    /**
     * Display the specified inventorymain.
     * GET|HEAD /inventorymains/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var inventorymain $inventorymain */
        $inventorymain = $this->inventorymainRepository->find($id);

        if (empty($inventorymain)) {
            return $this->sendError('Inventorymain not found');
        }

        return $this->sendResponse($inventorymain->toArray(), 'Inventorymain retrieved successfully');
    }

    /**
     * Update the specified inventorymain in storage.
     * PUT/PATCH /inventorymains/{id}
     *
     * @param int $id
     * @param UpdateinventorymainAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinventorymainAPIRequest $request)
    {
        $input = $request->all();

        /** @var inventorymain $inventorymain */
        $inventorymain = $this->inventorymainRepository->find($id);

        if (empty($inventorymain)) {
            return $this->sendError('Inventorymain not found');
        }

        $inventorymain = $this->inventorymainRepository->update($input, $id);

        return $this->sendResponse($inventorymain->toArray(), 'inventorymain updated successfully');
    }

    /**
     * Remove the specified inventorymain from storage.
     * DELETE /inventorymains/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var inventorymain $inventorymain */
        $inventorymain = $this->inventorymainRepository->find($id);

        if (empty($inventorymain)) {
            return $this->sendError('Inventorymain not found');
        }

        $inventorymain->delete();

        return $this->sendSuccess('Inventorymain deleted successfully');
    }
}
