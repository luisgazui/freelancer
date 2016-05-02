<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblTitulosAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblTitulosAPIRequest;
use FreelancerOnline\Models\TblTitulos;
use FreelancerOnline\Repositories\TblTitulosRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblTitulosController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblTitulosAPIController extends AppBaseController
{
    /** @var  TblTitulosRepository */
    private $tblTitulosRepository;

    public function __construct(TblTitulosRepository $tblTitulosRepo)
    {
        $this->tblTitulosRepository = $tblTitulosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTitulos",
     *      summary="Get a listing of the TblTitulos.",
     *      tags={"TblTitulos"},
     *      description="Get all TblTitulos",
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
     *                  @SWG\Items(ref="#/definitions/TblTitulos")
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
        $this->tblTitulosRepository->pushCriteria(new RequestCriteria($request));
        $this->tblTitulosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblTitulos = $this->tblTitulosRepository->all();

        return $this->sendResponse($tblTitulos->toArray(), 'TblTitulos retrieved successfully');
    }

    /**
     * @param CreateTblTitulosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblTitulos",
     *      summary="Store a newly created TblTitulos in storage",
     *      tags={"TblTitulos"},
     *      description="Store TblTitulos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTitulos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTitulos")
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
     *                  ref="#/definitions/TblTitulos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblTitulosAPIRequest $request)
    {
        $input = $request->all();

        $tblTitulos = $this->tblTitulosRepository->create($input);

        return $this->sendResponse($tblTitulos->toArray(), 'TblTitulos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTitulos/{id}",
     *      summary="Display the specified TblTitulos",
     *      tags={"TblTitulos"},
     *      description="Get TblTitulos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTitulos",
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
     *                  ref="#/definitions/TblTitulos"
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
        /** @var TblTitulos $tblTitulos */
        $tblTitulos = $this->tblTitulosRepository->find($id);

        if (empty($tblTitulos)) {
            return Response::json(ResponseUtil::makeError('TblTitulos not found'), 400);
        }

        return $this->sendResponse($tblTitulos->toArray(), 'TblTitulos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblTitulosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblTitulos/{id}",
     *      summary="Update the specified TblTitulos in storage",
     *      tags={"TblTitulos"},
     *      description="Update TblTitulos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTitulos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTitulos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTitulos")
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
     *                  ref="#/definitions/TblTitulos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblTitulosAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblTitulos $tblTitulos */
        $tblTitulos = $this->tblTitulosRepository->find($id);

        if (empty($tblTitulos)) {
            return Response::json(ResponseUtil::makeError('TblTitulos not found'), 400);
        }

        $tblTitulos = $this->tblTitulosRepository->update($input, $id);

        return $this->sendResponse($tblTitulos->toArray(), 'TblTitulos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblTitulos/{id}",
     *      summary="Remove the specified TblTitulos from storage",
     *      tags={"TblTitulos"},
     *      description="Delete TblTitulos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTitulos",
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
        /** @var TblTitulos $tblTitulos */
        $tblTitulos = $this->tblTitulosRepository->find($id);

        if (empty($tblTitulos)) {
            return Response::json(ResponseUtil::makeError('TblTitulos not found'), 400);
        }

        $tblTitulos->delete();

        return $this->sendResponse($id, 'TblTitulos deleted successfully');
    }
}
