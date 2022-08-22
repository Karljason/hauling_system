<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTestIdTypeAPIRequest;
use App\Http\Requests\API\UpdateTestIdTypeAPIRequest;
use App\Models\TestIdType;
use App\Repositories\TestIdTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TestIdTypeController
 * @package App\Http\Controllers\API
 */

class TestIdTypeAPIController extends AppBaseController
{
    /** @var  TestIdTypeRepository */
    private $testIdTypeRepository;

    public function __construct(TestIdTypeRepository $testIdTypeRepo)
    {
        $this->testIdTypeRepository = $testIdTypeRepo;
    }

    /**
     * Display a listing of the TestIdType.
     * GET|HEAD /testIdTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $testIdTypes = $this->testIdTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($testIdTypes->toArray(), 'Test Id Types retrieved successfully');
    }

    /**
     * Store a newly created TestIdType in storage.
     * POST /testIdTypes
     *
     * @param CreateTestIdTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTestIdTypeAPIRequest $request)
    {
        $input = $request->all();

        $testIdType = $this->testIdTypeRepository->create($input);

        return $this->sendResponse($testIdType->toArray(), 'Test Id Type saved successfully');
    }

    /**
     * Display the specified TestIdType.
     * GET|HEAD /testIdTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TestIdType $testIdType */
        $testIdType = $this->testIdTypeRepository->find($id);

        if (empty($testIdType)) {
            return $this->sendError('Test Id Type not found');
        }

        return $this->sendResponse($testIdType->toArray(), 'Test Id Type retrieved successfully');
    }

    /**
     * Update the specified TestIdType in storage.
     * PUT/PATCH /testIdTypes/{id}
     *
     * @param int $id
     * @param UpdateTestIdTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestIdTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var TestIdType $testIdType */
        $testIdType = $this->testIdTypeRepository->find($id);

        if (empty($testIdType)) {
            return $this->sendError('Test Id Type not found');
        }

        $testIdType = $this->testIdTypeRepository->update($input, $id);

        return $this->sendResponse($testIdType->toArray(), 'TestIdType updated successfully');
    }

    /**
     * Remove the specified TestIdType from storage.
     * DELETE /testIdTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TestIdType $testIdType */
        $testIdType = $this->testIdTypeRepository->find($id);

        if (empty($testIdType)) {
            return $this->sendError('Test Id Type not found');
        }

        $testIdType->delete();

        return $this->sendSuccess('Test Id Type deleted successfully');
    }
}
