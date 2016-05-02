<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblDocumentosAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblDocumentosAPIRequest;
use FreelancerOnline\Models\TblDocumentos;
use FreelancerOnline\Repositories\TblDocumentosRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblDocumentosController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblDocumentosAPIController extends AppBaseController
{
    /** @var  TblDocumentosRepository */
    private $tblDocumentosRepository;

    public function __construct(TblDocumentosRepository $tblDocumentosRepo)
    {
        $this->tblDocumentosRepository = $tblDocumentosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblDocumentos",
     *      summary="Get a listing of the TblDocumentos.",
     *      tags={"TblDocumentos"},
     *      description="Get all TblDocumentos",
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
     *                  @SWG\Items(ref="#/definitions/TblDocumentos")
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
        $this->tblDocumentosRepository->pushCriteria(new RequestCriteria($request));
        $this->tblDocumentosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblDocumentos = $this->tblDocumentosRepository->all();

        return $this->sendResponse($tblDocumentos->toArray(), 'TblDocumentos retrieved successfully');
    }

    /**
     * @param CreateTblDocumentosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblDocumentos",
     *      summary="Store a newly created TblDocumentos in storage",
     *      tags={"TblDocumentos"},
     *      description="Store TblDocumentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblDocumentos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblDocumentos")
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
     *                  ref="#/definitions/TblDocumentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblDocumentosAPIRequest $request)
    {
        $input = $request->all();

        $tblDocumentos = $this->tblDocumentosRepository->create($input);

        return $this->sendResponse($tblDocumentos->toArray(), 'TblDocumentos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblDocumentos/{id}",
     *      summary="Display the specified TblDocumentos",
     *      tags={"TblDocumentos"},
     *      description="Get TblDocumentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDocumentos",
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
     *                  ref="#/definitions/TblDocumentos"
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
        /** @var TblDocumentos $tblDocumentos */
        $tblDocumentos = $this->tblDocumentosRepository->find($id);

        if (empty($tblDocumentos)) {
            return Response::json(ResponseUtil::makeError('TblDocumentos not found'), 400);
        }

        return $this->sendResponse($tblDocumentos->toArray(), 'TblDocumentos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblDocumentosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblDocumentos/{id}",
     *      summary="Update the specified TblDocumentos in storage",
     *      tags={"TblDocumentos"},
     *      description="Update TblDocumentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDocumentos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblDocumentos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblDocumentos")
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
     *                  ref="#/definitions/TblDocumentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblDocumentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblDocumentos $tblDocumentos */
        $tblDocumentos = $this->tblDocumentosRepository->find($id);

        if (empty($tblDocumentos)) {
            return Response::json(ResponseUtil::makeError('TblDocumentos not found'), 400);
        }

        $tblDocumentos = $this->tblDocumentosRepository->update($input, $id);

        return $this->sendResponse($tblDocumentos->toArray(), 'TblDocumentos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblDocumentos/{id}",
     *      summary="Remove the specified TblDocumentos from storage",
     *      tags={"TblDocumentos"},
     *      description="Delete TblDocumentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblDocumentos",
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
        /** @var TblDocumentos $tblDocumentos */
        $tblDocumentos = $this->tblDocumentosRepository->find($id);

        if (empty($tblDocumentos)) {
            return Response::json(ResponseUtil::makeError('TblDocumentos not found'), 400);
        }

        $tblDocumentos->delete();

        return $this->sendResponse($id, 'TblDocumentos deleted successfully');
    }
}
