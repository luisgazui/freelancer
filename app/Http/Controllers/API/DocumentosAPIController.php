<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateDocumentosAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateDocumentosAPIRequest;
use FreelancerOnline\Models\Documentos;
use FreelancerOnline\Repositories\DocumentosRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocumentosController
 * @package FreelancerOnline\Http\Controllers\API
 */

class DocumentosAPIController extends AppBaseController
{
    /** @var  DocumentosRepository */
    private $documentosRepository;

    public function __construct(DocumentosRepository $documentosRepo)
    {
        $this->documentosRepository = $documentosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/documentos",
     *      summary="Get a listing of the Documentos.",
     *      tags={"Documentos"},
     *      description="Get all Documentos",
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
     *                  @SWG\Items(ref="#/definitions/Documentos")
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
        $this->documentosRepository->pushCriteria(new RequestCriteria($request));
        $this->documentosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $documentos = $this->documentosRepository->all();

        return $this->sendResponse($documentos->toArray(), 'Documentos retrieved successfully');
    }

    /**
     * @param CreateDocumentosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/documentos",
     *      summary="Store a newly created Documentos in storage",
     *      tags={"Documentos"},
     *      description="Store Documentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Documentos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Documentos")
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
     *                  ref="#/definitions/Documentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDocumentosAPIRequest $request)
    {
        $input = $request->all();

        $documentos = $this->documentosRepository->create($input);

        return $this->sendResponse($documentos->toArray(), 'Documentos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/documentos/{id}",
     *      summary="Display the specified Documentos",
     *      tags={"Documentos"},
     *      description="Get Documentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Documentos",
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
     *                  ref="#/definitions/Documentos"
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
        /** @var Documentos $documentos */
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            return Response::json(ResponseUtil::makeError('Documentos not found'), 400);
        }

        return $this->sendResponse($documentos->toArray(), 'Documentos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDocumentosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/documentos/{id}",
     *      summary="Update the specified Documentos in storage",
     *      tags={"Documentos"},
     *      description="Update Documentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Documentos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Documentos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Documentos")
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
     *                  ref="#/definitions/Documentos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDocumentosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Documentos $documentos */
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            return Response::json(ResponseUtil::makeError('Documentos not found'), 400);
        }

        $documentos = $this->documentosRepository->update($input, $id);

        return $this->sendResponse($documentos->toArray(), 'Documentos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/documentos/{id}",
     *      summary="Remove the specified Documentos from storage",
     *      tags={"Documentos"},
     *      description="Delete Documentos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Documentos",
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
        /** @var Documentos $documentos */
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            return Response::json(ResponseUtil::makeError('Documentos not found'), 400);
        }

        $documentos->delete();

        return $this->sendResponse($id, 'Documentos deleted successfully');
    }
}
