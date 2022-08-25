<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTruckTypeAPIRequest;
use App\Http\Requests\API\UpdateTruckTypeAPIRequest;
use App\Models\TruckType;
use App\Repositories\TruckTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TruckTypeController
 * @package App\Http\Controllers\API
 */

class TruckTypeAPIController extends AppBaseController
{
    /** @var  TruckTypeRepository */
    private $truckTypeRepository;

    public function __construct(TruckTypeRepository $truckTypeRepo)
    {
        $this->truckTypeRepository = $truckTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Get(
     *      path="/truckTypes",
     *      summary="getTruckTypeList",
     *      tags={"TruckType"},
     *      description="Get all TruckTypes",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/definitions/TruckType")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $truckTypes = $this->truckTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($truckTypes->toArray(), 'Truck Types retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Post(
     *      path="/truckTypes",
     *      summary="createTruckType",
     *      tags={"TruckType"},
     *      description="Create TruckType",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *                type="object",
     *                required={""},
     *                @OA\Property(
     *                    property="name",
     *                    description="desc",
     *                    type="string"
     *                )
     *            )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/TruckType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTruckTypeAPIRequest $request)
    {
        $input = $request->all();

        $truckType = $this->truckTypeRepository->create($input);

        return $this->sendResponse($truckType->toArray(), 'Truck Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/truckTypes/{id}",
     *      summary="getTruckTypeItem",
     *      tags={"TruckType"},
     *      description="Get TruckType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TruckType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/TruckType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var TruckType $truckType */
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            return $this->sendError('Truck Type not found');
        }

        return $this->sendResponse($truckType->toArray(), 'Truck Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/truckTypes/{id}",
     *      summary="updateTruckType",
     *      tags={"TruckType"},
     *      description="Update TruckType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TruckType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *                type="object",
     *                required={""},
     *                @OA\Property(
     *                    property="name",
     *                    description="desc",
     *                    type="string"
     *                )
     *            )
     *        )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/TruckType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTruckTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var TruckType $truckType */
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            return $this->sendError('Truck Type not found');
        }

        $truckType = $this->truckTypeRepository->update($input, $id);

        return $this->sendResponse($truckType->toArray(), 'TruckType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/truckTypes/{id}",
     *      summary="deleteTruckType",
     *      tags={"TruckType"},
     *      description="Delete TruckType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of TruckType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var TruckType $truckType */
        $truckType = $this->truckTypeRepository->find($id);

        if (empty($truckType)) {
            return $this->sendError('Truck Type not found');
        }

        $truckType->delete();

        return $this->sendSuccess('Truck Type deleted successfully');
    }
}
