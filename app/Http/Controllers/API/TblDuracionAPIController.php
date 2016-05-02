<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblDuracionAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblDuracionAPIRequest;
use FreelancerOnline\Models\TblDuracion;
use FreelancerOnline\Repositories\TblDuracionRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblDuracionController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblDuracionAPIController extends AppBaseController
{
    /** @var  TblDuracionRepository */
    private $tblDuracionRepository;

    public function __construct(TblDuracionRepository $tblDuracionRepo)
    {
        $this->tblDuracionRepository = $tblDuracionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblDuracions",
     *      summary="Get a listing of the TblDuracions.",
     *      tags={"TblDuracion"},
     *      description="Get all TblDuracions",
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
     *                  @SWG\Items(ref="#/definitions/TblDuracion")
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
        $this->tblDuracionRepository->pushCriteria(new RequestCriteria($request));
        $this->tblDuracionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblDuracions = $this->tblDuracionRepository->all();

        return $this->sendResponse($tblDuracions->toArray(), 'TblDuracions retrieved successfully');
    }

    /**
     * @param CreateTblDuracionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblDuracions",
     *      summary="Store a newly created TblDuracion in storage",
     *      tags={"TblDuracion"},
     *      description="Store TblDuracion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblDuracion that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblDuracion")
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
     *                  ref="#/definitions/TblDuracion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblDuracionAPIRequest $request)
    {
        $input = $request->all();

        $tblDuracions = $this->tblDuracionRepository->create($input);

        return $this->sendResponse($tblDuracions->toArray(), 'TblDuracion saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblDuracions/{id}",
     *      summary="Display the specified TblDuracion",
     *      tags={"TblDuracion"},
     *      description="Get TblDuracion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDuracion",
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
     *                  ref="#/definitions/TblDuracion"
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
        /** @var TblDuracion $tblDuracion */
        $tblDuracion = $this->tblDuracionRepository->find($id);

        if (empty($tblDuracion)) {
            return Response::json(ResponseUtil::makeError('TblDuracion not found'), 400);
        }

        return $this->sendResponse($tblDuracion->toArray(), 'TblDuracion retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblDuracionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblDuracions/{id}",
     *      summary="Update the specified TblDuracion in storage",
     *      tags={"TblDuracion"},
     *      description="Update TblDuracion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDuracion",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblDuracion that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblDuracion")
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
     *                  ref="#/definitions/TblDuracion"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblDuracionAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblDuracion $tblDuracion */
        $tblDuracion = $this->tblDuracionRepository->find($id);

        if (empty($tblDuracion)) {
            return Response::json(ResponseUtil::makeError('TblDuracion not found'), 400);
        }

        $tblDuracion = $this->tblDuracionRepository->update($input, $id);

        return $this->sendResponse($tblDuracion->toArray(), 'TblDuracion updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblDuracions/{id}",
     *      summary="Remove the specified TblDuracion from storage",
     *      tags={"TblDuracion"},
     *      description="Delete TblDuracion",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDuracion",
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
        /** @var TblDuracion $tblDuracion */
        $tblDuracion = $this->tblDuracionRepository->find($id);

        if (empty($tblDuracion)) {
            return Response::json(ResponseUtil::makeError('TblDuracion not found'), 400);
        }

        $tblDuracion->delete();

        return $this->sendResponse($id, 'TblDuracion deleted successfully');
    }
}
