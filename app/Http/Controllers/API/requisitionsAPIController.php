<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterequisitionsAPIRequest;
use App\Http\Requests\API\UpdaterequisitionsAPIRequest;
use App\Models\requisitions;
use App\Repositories\requisitionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class requisitionsController
 * @package App\Http\Controllers\API
 */

class requisitionsAPIController extends AppBaseController
{
    /** @var  requisitionsRepository */
    private $requisitionsRepository;

    public function __construct(requisitionsRepository $requisitionsRepo)
    {
        $this->requisitionsRepository = $requisitionsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Get(
     *      path="/requisitions",
     *      summary="getrequisitionsList",
     *      tags={"requisitions"},
     *      description="Get all requisitions",
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
     *                  @OA\Items(ref="#/definitions/requisitions")
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
        $requisitions = $this->requisitionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($requisitions->toArray(), 'Requisitions retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Post(
     *      path="/requisitions",
     *      summary="createrequisitions",
     *      tags={"requisitions"},
     *      description="Create requisitions",
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
     *                  ref="#/definitions/requisitions"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreaterequisitionsAPIRequest $request)
    {
        $input = $request->all();

        $requisitions = $this->requisitionsRepository->create($input);

        return $this->sendResponse($requisitions->toArray(), 'Requisitions saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/requisitions/{id}",
     *      summary="getrequisitionsItem",
     *      tags={"requisitions"},
     *      description="Get requisitions",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of requisitions",
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
     *                  ref="#/definitions/requisitions"
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
        /** @var requisitions $requisitions */
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            return $this->sendError('Requisitions not found');
        }

        return $this->sendResponse($requisitions->toArray(), 'Requisitions retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/requisitions/{id}",
     *      summary="updaterequisitions",
     *      tags={"requisitions"},
     *      description="Update requisitions",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of requisitions",
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
     *                  ref="#/definitions/requisitions"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdaterequisitionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var requisitions $requisitions */
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            return $this->sendError('Requisitions not found');
        }

        $requisitions = $this->requisitionsRepository->update($input, $id);

        return $this->sendResponse($requisitions->toArray(), 'requisitions updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/requisitions/{id}",
     *      summary="deleterequisitions",
     *      tags={"requisitions"},
     *      description="Delete requisitions",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of requisitions",
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
        /** @var requisitions $requisitions */
        $requisitions = $this->requisitionsRepository->find($id);

        if (empty($requisitions)) {
            return $this->sendError('Requisitions not found');
        }

        $requisitions->delete();

        return $this->sendSuccess('Requisitions deleted successfully');
    }
}
