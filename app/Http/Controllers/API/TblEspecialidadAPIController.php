<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblEspecialidadAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblEspecialidadAPIRequest;
use FreelancerOnline\Models\TblEspecialidad;
use FreelancerOnline\Repositories\TblEspecialidadRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblEspecialidadController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblEspecialidadAPIController extends AppBaseController
{
    /** @var  TblEspecialidadRepository */
    private $tblEspecialidadRepository;

    public function __construct(TblEspecialidadRepository $tblEspecialidadRepo)
    {
        $this->tblEspecialidadRepository = $tblEspecialidadRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblEspecialidads",
     *      summary="Get a listing of the TblEspecialidads.",
     *      tags={"TblEspecialidad"},
     *      description="Get all TblEspecialidads",
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
     *                  @SWG\Items(ref="#/definitions/TblEspecialidad")
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
        $this->tblEspecialidadRepository->pushCriteria(new RequestCriteria($request));
        $this->tblEspecialidadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblEspecialidads = $this->tblEspecialidadRepository->all();

        return $this->sendResponse($tblEspecialidads->toArray(), 'TblEspecialidads retrieved successfully');
    }

    /**
     * @param CreateTblEspecialidadAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblEspecialidads",
     *      summary="Store a newly created TblEspecialidad in storage",
     *      tags={"TblEspecialidad"},
     *      description="Store TblEspecialidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblEspecialidad that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblEspecialidad")
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
     *                  ref="#/definitions/TblEspecialidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblEspecialidadAPIRequest $request)
    {
        $input = $request->all();

        $tblEspecialidads = $this->tblEspecialidadRepository->create($input);

        return $this->sendResponse($tblEspecialidads->toArray(), 'TblEspecialidad saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblEspecialidads/{id}",
     *      summary="Display the specified TblEspecialidad",
     *      tags={"TblEspecialidad"},
     *      description="Get TblEspecialidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblEspecialidad",
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
     *                  ref="#/definitions/TblEspecialidad"
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
        /** @var TblEspecialidad $tblEspecialidad */
        $tblEspecialidad = $this->tblEspecialidadRepository->find($id);

        if (empty($tblEspecialidad)) {
            return Response::json(ResponseUtil::makeError('TblEspecialidad not found'), 400);
        }

        return $this->sendResponse($tblEspecialidad->toArray(), 'TblEspecialidad retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblEspecialidadAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblEspecialidads/{id}",
     *      summary="Update the specified TblEspecialidad in storage",
     *      tags={"TblEspecialidad"},
     *      description="Update TblEspecialidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblEspecialidad",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblEspecialidad that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblEspecialidad")
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
     *                  ref="#/definitions/TblEspecialidad"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblEspecialidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblEspecialidad $tblEspecialidad */
        $tblEspecialidad = $this->tblEspecialidadRepository->find($id);

        if (empty($tblEspecialidad)) {
            return Response::json(ResponseUtil::makeError('TblEspecialidad not found'), 400);
        }

        $tblEspecialidad = $this->tblEspecialidadRepository->update($input, $id);

        return $this->sendResponse($tblEspecialidad->toArray(), 'TblEspecialidad updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblEspecialidads/{id}",
     *      summary="Remove the specified TblEspecialidad from storage",
     *      tags={"TblEspecialidad"},
     *      description="Delete TblEspecialidad",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblEspecialidad",
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
        /** @var TblEspecialidad $tblEspecialidad */
        $tblEspecialidad = $this->tblEspecialidadRepository->find($id);

        if (empty($tblEspecialidad)) {
            return Response::json(ResponseUtil::makeError('TblEspecialidad not found'), 400);
        }

        $tblEspecialidad->delete();

        return $this->sendResponse($id, 'TblEspecialidad deleted successfully');
    }
}
