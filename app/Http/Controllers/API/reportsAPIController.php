<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereportsAPIRequest;
use App\Http\Requests\API\UpdatereportsAPIRequest;
use App\Models\reports;
use App\Repositories\reportsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class reportsController
 * @package App\Http\Controllers\API
 */

class reportsAPIController extends AppBaseController
{
    /** @var  reportsRepository */
    private $reportsRepository;

    public function __construct(reportsRepository $reportsRepo)
    {
        $this->reportsRepository = $reportsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Get(
     *      path="/reports",
     *      summary="getreportsList",
     *      tags={"reports"},
     *      description="Get all reports",
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
     *                  @OA\Items(ref="#/definitions/reports")
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
        $reports = $this->reportsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reports->toArray(), 'Reports retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @OA\Post(
     *      path="/reports",
     *      summary="createreports",
     *      tags={"reports"},
     *      description="Create reports",
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
     *                  ref="#/definitions/reports"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatereportsAPIRequest $request)
    {
        $input = $request->all();

        $reports = $this->reportsRepository->create($input);

        return $this->sendResponse($reports->toArray(), 'Reports saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/reports/{id}",
     *      summary="getreportsItem",
     *      tags={"reports"},
     *      description="Get reports",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of reports",
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
     *                  ref="#/definitions/reports"
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
        /** @var reports $reports */
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            return $this->sendError('Reports not found');
        }

        return $this->sendResponse($reports->toArray(), 'Reports retrieved successfully');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @OA\Put(
     *      path="/reports/{id}",
     *      summary="updatereports",
     *      tags={"reports"},
     *      description="Update reports",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of reports",
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
     *                  ref="#/definitions/reports"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatereportsAPIRequest $request)
    {
        $input = $request->all();

        /** @var reports $reports */
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            return $this->sendError('Reports not found');
        }

        $reports = $this->reportsRepository->update($input, $id);

        return $this->sendResponse($reports->toArray(), 'reports updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/reports/{id}",
     *      summary="deletereports",
     *      tags={"reports"},
     *      description="Delete reports",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of reports",
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
        /** @var reports $reports */
        $reports = $this->reportsRepository->find($id);

        if (empty($reports)) {
            return $this->sendError('Reports not found');
        }

        $reports->delete();

        return $this->sendSuccess('Reports deleted successfully');
    }
}
