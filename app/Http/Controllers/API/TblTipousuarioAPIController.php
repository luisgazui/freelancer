<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblTipousuarioAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblTipousuarioAPIRequest;
use FreelancerOnline\Models\TblTipousuario;
use FreelancerOnline\Repositories\TblTipousuarioRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblTipousuarioController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblTipousuarioAPIController extends AppBaseController
{
    /** @var  TblTipousuarioRepository */
    private $tblTipousuarioRepository;

    public function __construct(TblTipousuarioRepository $tblTipousuarioRepo)
    {
        $this->tblTipousuarioRepository = $tblTipousuarioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTipousuarios",
     *      summary="Get a listing of the TblTipousuarios.",
     *      tags={"TblTipousuario"},
     *      description="Get all TblTipousuarios",
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
     *                  @SWG\Items(ref="#/definitions/TblTipousuario")
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
        $this->tblTipousuarioRepository->pushCriteria(new RequestCriteria($request));
        $this->tblTipousuarioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblTipousuarios = $this->tblTipousuarioRepository->all();

        return $this->sendResponse($tblTipousuarios->toArray(), 'TblTipousuarios retrieved successfully');
    }

    /**
     * @param CreateTblTipousuarioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblTipousuarios",
     *      summary="Store a newly created TblTipousuario in storage",
     *      tags={"TblTipousuario"},
     *      description="Store TblTipousuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTipousuario that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTipousuario")
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
     *                  ref="#/definitions/TblTipousuario"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblTipousuarioAPIRequest $request)
    {
        $input = $request->all();

        $tblTipousuarios = $this->tblTipousuarioRepository->create($input);

        return $this->sendResponse($tblTipousuarios->toArray(), 'TblTipousuario saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTipousuarios/{id}",
     *      summary="Display the specified TblTipousuario",
     *      tags={"TblTipousuario"},
     *      description="Get TblTipousuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipousuario",
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
     *                  ref="#/definitions/TblTipousuario"
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
        /** @var TblTipousuario $tblTipousuario */
        $tblTipousuario = $this->tblTipousuarioRepository->find($id);

        if (empty($tblTipousuario)) {
            return Response::json(ResponseUtil::makeError('TblTipousuario not found'), 400);
        }

        return $this->sendResponse($tblTipousuario->toArray(), 'TblTipousuario retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblTipousuarioAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblTipousuarios/{id}",
     *      summary="Update the specified TblTipousuario in storage",
     *      tags={"TblTipousuario"},
     *      description="Update TblTipousuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipousuario",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTipousuario that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTipousuario")
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
     *                  ref="#/definitions/TblTipousuario"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblTipousuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblTipousuario $tblTipousuario */
        $tblTipousuario = $this->tblTipousuarioRepository->find($id);

        if (empty($tblTipousuario)) {
            return Response::json(ResponseUtil::makeError('TblTipousuario not found'), 400);
        }

        $tblTipousuario = $this->tblTipousuarioRepository->update($input, $id);

        return $this->sendResponse($tblTipousuario->toArray(), 'TblTipousuario updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblTipousuarios/{id}",
     *      summary="Remove the specified TblTipousuario from storage",
     *      tags={"TblTipousuario"},
     *      description="Delete TblTipousuario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipousuario",
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
        /** @var TblTipousuario $tblTipousuario */
        $tblTipousuario = $this->tblTipousuarioRepository->find($id);

        if (empty($tblTipousuario)) {
            return Response::json(ResponseUtil::makeError('TblTipousuario not found'), 400);
        }

        $tblTipousuario->delete();

        return $this->sendResponse($id, 'TblTipousuario deleted successfully');
    }
}
