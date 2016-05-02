<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblBancosAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblBancosAPIRequest;
use FreelancerOnline\Models\TblBancos;
use FreelancerOnline\Repositories\TblBancosRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblBancosController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblBancosAPIController extends AppBaseController
{
    /** @var  TblBancosRepository */
    private $tblBancosRepository;

    public function __construct(TblBancosRepository $tblBancosRepo)
    {
        $this->tblBancosRepository = $tblBancosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblBancos",
     *      summary="Get a listing of the TblBancos.",
     *      tags={"TblBancos"},
     *      description="Get all TblBancos",
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
     *                  @SWG\Items(ref="#/definitions/TblBancos")
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
        $this->tblBancosRepository->pushCriteria(new RequestCriteria($request));
        $this->tblBancosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblBancos = $this->tblBancosRepository->all();

        return $this->sendResponse($tblBancos->toArray(), 'TblBancos retrieved successfully');
    }

    /**
     * @param CreateTblBancosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblBancos",
     *      summary="Store a newly created TblBancos in storage",
     *      tags={"TblBancos"},
     *      description="Store TblBancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblBancos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblBancos")
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
     *                  ref="#/definitions/TblBancos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblBancosAPIRequest $request)
    {
        $input = $request->all();

        $tblBancos = $this->tblBancosRepository->create($input);

        return $this->sendResponse($tblBancos->toArray(), 'TblBancos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblBancos/{id}",
     *      summary="Display the specified TblBancos",
     *      tags={"TblBancos"},
     *      description="Get TblBancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblBancos",
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
     *                  ref="#/definitions/TblBancos"
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
        /** @var TblBancos $tblBancos */
        $tblBancos = $this->tblBancosRepository->find($id);

        if (empty($tblBancos)) {
            return Response::json(ResponseUtil::makeError('TblBancos not found'), 400);
        }

        return $this->sendResponse($tblBancos->toArray(), 'TblBancos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblBancosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblBancos/{id}",
     *      summary="Update the specified TblBancos in storage",
     *      tags={"TblBancos"},
     *      description="Update TblBancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblBancos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblBancos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblBancos")
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
     *                  ref="#/definitions/TblBancos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblBancosAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblBancos $tblBancos */
        $tblBancos = $this->tblBancosRepository->find($id);

        if (empty($tblBancos)) {
            return Response::json(ResponseUtil::makeError('TblBancos not found'), 400);
        }

        $tblBancos = $this->tblBancosRepository->update($input, $id);

        return $this->sendResponse($tblBancos->toArray(), 'TblBancos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblBancos/{id}",
     *      summary="Remove the specified TblBancos from storage",
     *      tags={"TblBancos"},
     *      description="Delete TblBancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblBancos",
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
        /** @var TblBancos $tblBancos */
        $tblBancos = $this->tblBancosRepository->find($id);

        if (empty($tblBancos)) {
            return Response::json(ResponseUtil::makeError('TblBancos not found'), 400);
        }

        $tblBancos->delete();

        return $this->sendResponse($id, 'TblBancos deleted successfully');
    }
}
