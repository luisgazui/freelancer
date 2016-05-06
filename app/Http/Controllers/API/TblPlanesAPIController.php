<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblPlanesAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblPlanesAPIRequest;
use FreelancerOnline\Models\TblPlanes;
use FreelancerOnline\Repositories\TblPlanesRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblPlanesController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblPlanesAPIController extends AppBaseController
{
    /** @var  TblPlanesRepository */
    private $tblPlanesRepository;

    public function __construct(TblPlanesRepository $tblPlanesRepo)
    {
        $this->tblPlanesRepository = $tblPlanesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPlanes",
     *      summary="Get a listing of the TblPlanes.",
     *      tags={"TblPlanes"},
     *      description="Get all TblPlanes",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/TblPlanes")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->tblPlanesRepository->pushCriteria(new RequestCriteria($request));
        $this->tblPlanesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblPlanes = $this->tblPlanesRepository->all();

        return $this->sendResponse($tblPlanes->toArray(), 'TblPlanes retrieved successfully');
    }

    /**
     * @param CreateTblPlanesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblPlanes",
     *      summary="Store a newly created TblPlanes in storage",
     *      tags={"TblPlanes"},
     *      description="Store TblPlanes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPlanes that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPlanes")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TblPlanes"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblPlanesAPIRequest $request)
    {
        $input = $request->all();

        $tblPlanes = $this->tblPlanesRepository->create($input);

        return $this->sendResponse($tblPlanes->toArray(), 'TblPlanes saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPlanes/{id}",
     *      summary="Display the specified TblPlanes",
     *      tags={"TblPlanes"},
     *      description="Get TblPlanes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPlanes",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TblPlanes"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var TblPlanes $tblPlanes */
        $tblPlanes = $this->tblPlanesRepository->find($id);

        if (empty($tblPlanes)) {
            return Response::json(ResponseUtil::makeError('TblPlanes not found'), 400);
        }

        return $this->sendResponse($tblPlanes->toArray(), 'TblPlanes retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblPlanesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblPlanes/{id}",
     *      summary="Update the specified TblPlanes in storage",
     *      tags={"TblPlanes"},
     *      description="Update TblPlanes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPlanes",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPlanes that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPlanes")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TblPlanes"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblPlanesAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblPlanes $tblPlanes */
        $tblPlanes = $this->tblPlanesRepository->find($id);

        if (empty($tblPlanes)) {
            return Response::json(ResponseUtil::makeError('TblPlanes not found'), 400);
        }

        $tblPlanes = $this->tblPlanesRepository->update($input, $id);

        return $this->sendResponse($tblPlanes->toArray(), 'TblPlanes updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblPlanes/{id}",
     *      summary="Remove the specified TblPlanes from storage",
     *      tags={"TblPlanes"},
     *      description="Delete TblPlanes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPlanes",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var TblPlanes $tblPlanes */
        $tblPlanes = $this->tblPlanesRepository->find($id);

        if (empty($tblPlanes)) {
            return Response::json(ResponseUtil::makeError('TblPlanes not found'), 400);
        }

        $tblPlanes->delete();

        return $this->sendResponse($id, 'TblPlanes deleted successfully');
    }
}
