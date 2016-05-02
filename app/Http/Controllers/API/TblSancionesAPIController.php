<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblSancionesAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblSancionesAPIRequest;
use FreelancerOnline\Models\TblSanciones;
use FreelancerOnline\Repositories\TblSancionesRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblSancionesController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblSancionesAPIController extends AppBaseController
{
    /** @var  TblSancionesRepository */
    private $tblSancionesRepository;

    public function __construct(TblSancionesRepository $tblSancionesRepo)
    {
        $this->tblSancionesRepository = $tblSancionesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblSanciones",
     *      summary="Get a listing of the TblSanciones.",
     *      tags={"TblSanciones"},
     *      description="Get all TblSanciones",
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
     *                  @SWG\Items(ref="#/definitions/TblSanciones")
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
        $this->tblSancionesRepository->pushCriteria(new RequestCriteria($request));
        $this->tblSancionesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblSanciones = $this->tblSancionesRepository->all();

        return $this->sendResponse($tblSanciones->toArray(), 'TblSanciones retrieved successfully');
    }

    /**
     * @param CreateTblSancionesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblSanciones",
     *      summary="Store a newly created TblSanciones in storage",
     *      tags={"TblSanciones"},
     *      description="Store TblSanciones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblSanciones that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblSanciones")
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
     *                  ref="#/definitions/TblSanciones"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblSancionesAPIRequest $request)
    {
        $input = $request->all();

        $tblSanciones = $this->tblSancionesRepository->create($input);

        return $this->sendResponse($tblSanciones->toArray(), 'TblSanciones saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblSanciones/{id}",
     *      summary="Display the specified TblSanciones",
     *      tags={"TblSanciones"},
     *      description="Get TblSanciones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSanciones",
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
     *                  ref="#/definitions/TblSanciones"
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
        /** @var TblSanciones $tblSanciones */
        $tblSanciones = $this->tblSancionesRepository->find($id);

        if (empty($tblSanciones)) {
            return Response::json(ResponseUtil::makeError('TblSanciones not found'), 400);
        }

        return $this->sendResponse($tblSanciones->toArray(), 'TblSanciones retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblSancionesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblSanciones/{id}",
     *      summary="Update the specified TblSanciones in storage",
     *      tags={"TblSanciones"},
     *      description="Update TblSanciones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSanciones",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblSanciones that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblSanciones")
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
     *                  ref="#/definitions/TblSanciones"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblSancionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblSanciones $tblSanciones */
        $tblSanciones = $this->tblSancionesRepository->find($id);

        if (empty($tblSanciones)) {
            return Response::json(ResponseUtil::makeError('TblSanciones not found'), 400);
        }

        $tblSanciones = $this->tblSancionesRepository->update($input, $id);

        return $this->sendResponse($tblSanciones->toArray(), 'TblSanciones updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblSanciones/{id}",
     *      summary="Remove the specified TblSanciones from storage",
     *      tags={"TblSanciones"},
     *      description="Delete TblSanciones",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSanciones",
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
        /** @var TblSanciones $tblSanciones */
        $tblSanciones = $this->tblSancionesRepository->find($id);

        if (empty($tblSanciones)) {
            return Response::json(ResponseUtil::makeError('TblSanciones not found'), 400);
        }

        $tblSanciones->delete();

        return $this->sendResponse($id, 'TblSanciones deleted successfully');
    }
}
