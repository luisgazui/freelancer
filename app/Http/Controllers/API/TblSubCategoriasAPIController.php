<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblSubCategoriasAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblSubCategoriasAPIRequest;
use FreelancerOnline\Models\TblSubCategorias;
use FreelancerOnline\Repositories\TblSubCategoriasRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblSubCategoriasController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblSubCategoriasAPIController extends AppBaseController
{
    /** @var  TblSubCategoriasRepository */
    private $tblSubCategoriasRepository;

    public function __construct(TblSubCategoriasRepository $tblSubCategoriasRepo)
    {
        $this->tblSubCategoriasRepository = $tblSubCategoriasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblSubCategorias",
     *      summary="Get a listing of the TblSubCategorias.",
     *      tags={"TblSubCategorias"},
     *      description="Get all TblSubCategorias",
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
     *                  @SWG\Items(ref="#/definitions/TblSubCategorias")
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
        $this->tblSubCategoriasRepository->pushCriteria(new RequestCriteria($request));
        $this->tblSubCategoriasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblSubCategorias = $this->tblSubCategoriasRepository->all();

        return $this->sendResponse($tblSubCategorias->toArray(), 'TblSubCategorias retrieved successfully');
    }

    /**
     * @param CreateTblSubCategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblSubCategorias",
     *      summary="Store a newly created TblSubCategorias in storage",
     *      tags={"TblSubCategorias"},
     *      description="Store TblSubCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblSubCategorias that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblSubCategorias")
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
     *                  ref="#/definitions/TblSubCategorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblSubCategoriasAPIRequest $request)
    {
        $input = $request->all();

        $tblSubCategorias = $this->tblSubCategoriasRepository->create($input);

        return $this->sendResponse($tblSubCategorias->toArray(), 'TblSubCategorias saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblSubCategorias/{id}",
     *      summary="Display the specified TblSubCategorias",
     *      tags={"TblSubCategorias"},
     *      description="Get TblSubCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSubCategorias",
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
     *                  ref="#/definitions/TblSubCategorias"
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
        /** @var TblSubCategorias $tblSubCategorias */
        $tblSubCategorias = $this->tblSubCategoriasRepository->find($id);

        if (empty($tblSubCategorias)) {
            return Response::json(ResponseUtil::makeError('TblSubCategorias not found'), 400);
        }

        return $this->sendResponse($tblSubCategorias->toArray(), 'TblSubCategorias retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblSubCategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblSubCategorias/{id}",
     *      summary="Update the specified TblSubCategorias in storage",
     *      tags={"TblSubCategorias"},
     *      description="Update TblSubCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSubCategorias",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblSubCategorias that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblSubCategorias")
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
     *                  ref="#/definitions/TblSubCategorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblSubCategoriasAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblSubCategorias $tblSubCategorias */
        $tblSubCategorias = $this->tblSubCategoriasRepository->find($id);

        if (empty($tblSubCategorias)) {
            return Response::json(ResponseUtil::makeError('TblSubCategorias not found'), 400);
        }

        $tblSubCategorias = $this->tblSubCategoriasRepository->update($input, $id);

        return $this->sendResponse($tblSubCategorias->toArray(), 'TblSubCategorias updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblSubCategorias/{id}",
     *      summary="Remove the specified TblSubCategorias from storage",
     *      tags={"TblSubCategorias"},
     *      description="Delete TblSubCategorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblSubCategorias",
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
        /** @var TblSubCategorias $tblSubCategorias */
        $tblSubCategorias = $this->tblSubCategoriasRepository->find($id);

        if (empty($tblSubCategorias)) {
            return Response::json(ResponseUtil::makeError('TblSubCategorias not found'), 400);
        }

        $tblSubCategorias->delete();

        return $this->sendResponse($id, 'TblSubCategorias deleted successfully');
    }
}
