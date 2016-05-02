<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblExperienciaAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblExperienciaAPIRequest;
use FreelancerOnline\Models\TblExperiencia;
use FreelancerOnline\Repositories\TblExperienciaRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblExperienciaController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblExperienciaAPIController extends AppBaseController
{
    /** @var  TblExperienciaRepository */
    private $tblExperienciaRepository;

    public function __construct(TblExperienciaRepository $tblExperienciaRepo)
    {
        $this->tblExperienciaRepository = $tblExperienciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblExperiencias",
     *      summary="Get a listing of the TblExperiencias.",
     *      tags={"TblExperiencia"},
     *      description="Get all TblExperiencias",
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
     *                  @SWG\Items(ref="#/definitions/TblExperiencia")
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
        $this->tblExperienciaRepository->pushCriteria(new RequestCriteria($request));
        $this->tblExperienciaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblExperiencias = $this->tblExperienciaRepository->all();

        return $this->sendResponse($tblExperiencias->toArray(), 'TblExperiencias retrieved successfully');
    }

    /**
     * @param CreateTblExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblExperiencias",
     *      summary="Store a newly created TblExperiencia in storage",
     *      tags={"TblExperiencia"},
     *      description="Store TblExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblExperiencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblExperiencia")
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
     *                  ref="#/definitions/TblExperiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblExperienciaAPIRequest $request)
    {
        $input = $request->all();

        $tblExperiencias = $this->tblExperienciaRepository->create($input);

        return $this->sendResponse($tblExperiencias->toArray(), 'TblExperiencia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblExperiencias/{id}",
     *      summary="Display the specified TblExperiencia",
     *      tags={"TblExperiencia"},
     *      description="Get TblExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblExperiencia",
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
     *                  ref="#/definitions/TblExperiencia"
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
        /** @var TblExperiencia $tblExperiencia */
        $tblExperiencia = $this->tblExperienciaRepository->find($id);

        if (empty($tblExperiencia)) {
            return Response::json(ResponseUtil::makeError('TblExperiencia not found'), 400);
        }

        return $this->sendResponse($tblExperiencia->toArray(), 'TblExperiencia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblExperiencias/{id}",
     *      summary="Update the specified TblExperiencia in storage",
     *      tags={"TblExperiencia"},
     *      description="Update TblExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblExperiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblExperiencia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblExperiencia")
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
     *                  ref="#/definitions/TblExperiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblExperienciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblExperiencia $tblExperiencia */
        $tblExperiencia = $this->tblExperienciaRepository->find($id);

        if (empty($tblExperiencia)) {
            return Response::json(ResponseUtil::makeError('TblExperiencia not found'), 400);
        }

        $tblExperiencia = $this->tblExperienciaRepository->update($input, $id);

        return $this->sendResponse($tblExperiencia->toArray(), 'TblExperiencia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblExperiencias/{id}",
     *      summary="Remove the specified TblExperiencia from storage",
     *      tags={"TblExperiencia"},
     *      description="Delete TblExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblExperiencia",
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
        /** @var TblExperiencia $tblExperiencia */
        $tblExperiencia = $this->tblExperienciaRepository->find($id);

        if (empty($tblExperiencia)) {
            return Response::json(ResponseUtil::makeError('TblExperiencia not found'), 400);
        }

        $tblExperiencia->delete();

        return $this->sendResponse($id, 'TblExperiencia deleted successfully');
    }
}
