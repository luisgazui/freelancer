<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblStatusproyectoAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblStatusproyectoAPIRequest;
use FreelancerOnline\Models\TblStatusproyecto;
use FreelancerOnline\Repositories\TblStatusproyectoRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblStatusproyectoController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblStatusproyectoAPIController extends AppBaseController
{
    /** @var  TblStatusproyectoRepository */
    private $tblStatusproyectoRepository;

    public function __construct(TblStatusproyectoRepository $tblStatusproyectoRepo)
    {
        $this->tblStatusproyectoRepository = $tblStatusproyectoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblStatusproyectos",
     *      summary="Get a listing of the TblStatusproyectos.",
     *      tags={"TblStatusproyecto"},
     *      description="Get all TblStatusproyectos",
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
     *                  @SWG\Items(ref="#/definitions/TblStatusproyecto")
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
        $this->tblStatusproyectoRepository->pushCriteria(new RequestCriteria($request));
        $this->tblStatusproyectoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblStatusproyectos = $this->tblStatusproyectoRepository->all();

        return $this->sendResponse($tblStatusproyectos->toArray(), 'TblStatusproyectos retrieved successfully');
    }

    /**
     * @param CreateTblStatusproyectoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblStatusproyectos",
     *      summary="Store a newly created TblStatusproyecto in storage",
     *      tags={"TblStatusproyecto"},
     *      description="Store TblStatusproyecto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblStatusproyecto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblStatusproyecto")
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
     *                  ref="#/definitions/TblStatusproyecto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblStatusproyectoAPIRequest $request)
    {
        $input = $request->all();

        $tblStatusproyectos = $this->tblStatusproyectoRepository->create($input);

        return $this->sendResponse($tblStatusproyectos->toArray(), 'TblStatusproyecto saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblStatusproyectos/{id}",
     *      summary="Display the specified TblStatusproyecto",
     *      tags={"TblStatusproyecto"},
     *      description="Get TblStatusproyecto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblStatusproyecto",
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
     *                  ref="#/definitions/TblStatusproyecto"
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
        /** @var TblStatusproyecto $tblStatusproyecto */
        $tblStatusproyecto = $this->tblStatusproyectoRepository->find($id);

        if (empty($tblStatusproyecto)) {
            return Response::json(ResponseUtil::makeError('TblStatusproyecto not found'), 400);
        }

        return $this->sendResponse($tblStatusproyecto->toArray(), 'TblStatusproyecto retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblStatusproyectoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblStatusproyectos/{id}",
     *      summary="Update the specified TblStatusproyecto in storage",
     *      tags={"TblStatusproyecto"},
     *      description="Update TblStatusproyecto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblStatusproyecto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblStatusproyecto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblStatusproyecto")
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
     *                  ref="#/definitions/TblStatusproyecto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblStatusproyectoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblStatusproyecto $tblStatusproyecto */
        $tblStatusproyecto = $this->tblStatusproyectoRepository->find($id);

        if (empty($tblStatusproyecto)) {
            return Response::json(ResponseUtil::makeError('TblStatusproyecto not found'), 400);
        }

        $tblStatusproyecto = $this->tblStatusproyectoRepository->update($input, $id);

        return $this->sendResponse($tblStatusproyecto->toArray(), 'TblStatusproyecto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblStatusproyectos/{id}",
     *      summary="Remove the specified TblStatusproyecto from storage",
     *      tags={"TblStatusproyecto"},
     *      description="Delete TblStatusproyecto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblStatusproyecto",
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
        /** @var TblStatusproyecto $tblStatusproyecto */
        $tblStatusproyecto = $this->tblStatusproyectoRepository->find($id);

        if (empty($tblStatusproyecto)) {
            return Response::json(ResponseUtil::makeError('TblStatusproyecto not found'), 400);
        }

        $tblStatusproyecto->delete();

        return $this->sendResponse($id, 'TblStatusproyecto deleted successfully');
    }
}
