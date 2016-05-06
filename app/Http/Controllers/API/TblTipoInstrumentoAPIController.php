<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblTipoInstrumentoAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblTipoInstrumentoAPIRequest;
use FreelancerOnline\Models\TblTipoInstrumento;
use FreelancerOnline\Repositories\TblTipoInstrumentoRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblTipoInstrumentoController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblTipoInstrumentoAPIController extends AppBaseController
{
    /** @var  TblTipoInstrumentoRepository */
    private $tblTipoInstrumentoRepository;

    public function __construct(TblTipoInstrumentoRepository $tblTipoInstrumentoRepo)
    {
        $this->tblTipoInstrumentoRepository = $tblTipoInstrumentoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTipoInstrumentos",
     *      summary="Get a listing of the TblTipoInstrumentos.",
     *      tags={"TblTipoInstrumento"},
     *      description="Get all TblTipoInstrumentos",
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
     *                  @SWG\Items(ref="#/definitions/TblTipoInstrumento")
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
        $this->tblTipoInstrumentoRepository->pushCriteria(new RequestCriteria($request));
        $this->tblTipoInstrumentoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblTipoInstrumentos = $this->tblTipoInstrumentoRepository->all();

        return $this->sendResponse($tblTipoInstrumentos->toArray(), 'TblTipoInstrumentos retrieved successfully');
    }

    /**
     * @param CreateTblTipoInstrumentoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblTipoInstrumentos",
     *      summary="Store a newly created TblTipoInstrumento in storage",
     *      tags={"TblTipoInstrumento"},
     *      description="Store TblTipoInstrumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTipoInstrumento that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTipoInstrumento")
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
     *                  ref="#/definitions/TblTipoInstrumento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblTipoInstrumentoAPIRequest $request)
    {
        $input = $request->all();

        $tblTipoInstrumentos = $this->tblTipoInstrumentoRepository->create($input);

        return $this->sendResponse($tblTipoInstrumentos->toArray(), 'TblTipoInstrumento saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTipoInstrumentos/{id}",
     *      summary="Display the specified TblTipoInstrumento",
     *      tags={"TblTipoInstrumento"},
     *      description="Get TblTipoInstrumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipoInstrumento",
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
     *                  ref="#/definitions/TblTipoInstrumento"
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
        /** @var TblTipoInstrumento $tblTipoInstrumento */
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->find($id);

        if (empty($tblTipoInstrumento)) {
            return Response::json(ResponseUtil::makeError('TblTipoInstrumento not found'), 400);
        }

        return $this->sendResponse($tblTipoInstrumento->toArray(), 'TblTipoInstrumento retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblTipoInstrumentoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblTipoInstrumentos/{id}",
     *      summary="Update the specified TblTipoInstrumento in storage",
     *      tags={"TblTipoInstrumento"},
     *      description="Update TblTipoInstrumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipoInstrumento",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTipoInstrumento that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTipoInstrumento")
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
     *                  ref="#/definitions/TblTipoInstrumento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblTipoInstrumentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblTipoInstrumento $tblTipoInstrumento */
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->find($id);

        if (empty($tblTipoInstrumento)) {
            return Response::json(ResponseUtil::makeError('TblTipoInstrumento not found'), 400);
        }

        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->update($input, $id);

        return $this->sendResponse($tblTipoInstrumento->toArray(), 'TblTipoInstrumento updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblTipoInstrumentos/{id}",
     *      summary="Remove the specified TblTipoInstrumento from storage",
     *      tags={"TblTipoInstrumento"},
     *      description="Delete TblTipoInstrumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTipoInstrumento",
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
        /** @var TblTipoInstrumento $tblTipoInstrumento */
        $tblTipoInstrumento = $this->tblTipoInstrumentoRepository->find($id);

        if (empty($tblTipoInstrumento)) {
            return Response::json(ResponseUtil::makeError('TblTipoInstrumento not found'), 400);
        }

        $tblTipoInstrumento->delete();

        return $this->sendResponse($id, 'TblTipoInstrumento deleted successfully');
    }
}
