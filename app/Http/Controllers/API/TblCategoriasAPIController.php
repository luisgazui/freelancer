<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblCategoriasAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblCategoriasAPIRequest;
use FreelancerOnline\Models\TblCategorias;
use FreelancerOnline\Repositories\TblCategoriasRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblCategoriasController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblCategoriasAPIController extends AppBaseController
{
    /** @var  TblCategoriasRepository */
    private $tblCategoriasRepository;

    public function __construct(TblCategoriasRepository $tblCategoriasRepo)
    {
        $this->tblCategoriasRepository = $tblCategoriasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCategorias",
     *      summary="Get a listing of the TblCategorias.",
     *      tags={"TblCategorias"},
     *      description="Get all TblCategorias",
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
     *                  @SWG\Items(ref="#/definitions/TblCategorias")
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
        $this->tblCategoriasRepository->pushCriteria(new RequestCriteria($request));
        $this->tblCategoriasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblCategorias = $this->tblCategoriasRepository->all();

        return $this->sendResponse($tblCategorias->toArray(), 'TblCategorias retrieved successfully');
    }

    /**
     * @param CreateTblCategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblCategorias",
     *      summary="Store a newly created TblCategorias in storage",
     *      tags={"TblCategorias"},
     *      description="Store TblCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblCategorias that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblCategorias")
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
     *                  ref="#/definitions/TblCategorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblCategoriasAPIRequest $request)
    {
        $input = $request->all();

        $tblCategorias = $this->tblCategoriasRepository->create($input);

        return $this->sendResponse($tblCategorias->toArray(), 'TblCategorias saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCategorias/{id}",
     *      summary="Display the specified TblCategorias",
     *      tags={"TblCategorias"},
     *      description="Get TblCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblCategorias",
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
     *                  ref="#/definitions/TblCategorias"
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
        /** @var TblCategorias $tblCategorias */
        $tblCategorias = $this->tblCategoriasRepository->find($id);

        if (empty($tblCategorias)) {
            return Response::json(ResponseUtil::makeError('TblCategorias not found'), 400);
        }

        return $this->sendResponse($tblCategorias->toArray(), 'TblCategorias retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblCategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblCategorias/{id}",
     *      summary="Update the specified TblCategorias in storage",
     *      tags={"TblCategorias"},
     *      description="Update TblCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblCategorias",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblCategorias that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblCategorias")
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
     *                  ref="#/definitions/TblCategorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblCategoriasAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblCategorias $tblCategorias */
        $tblCategorias = $this->tblCategoriasRepository->find($id);

        if (empty($tblCategorias)) {
            return Response::json(ResponseUtil::makeError('TblCategorias not found'), 400);
        }

        $tblCategorias = $this->tblCategoriasRepository->update($input, $id);

        return $this->sendResponse($tblCategorias->toArray(), 'TblCategorias updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblCategorias/{id}",
     *      summary="Remove the specified TblCategorias from storage",
     *      tags={"TblCategorias"},
     *      description="Delete TblCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblCategorias",
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
        /** @var TblCategorias $tblCategorias */
        $tblCategorias = $this->tblCategoriasRepository->find($id);

        if (empty($tblCategorias)) {
            return Response::json(ResponseUtil::makeError('TblCategorias not found'), 400);
        }

        $tblCategorias->delete();

        return $this->sendResponse($id, 'TblCategorias deleted successfully');
    }
}
