<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreatecategoriasAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdatecategoriasAPIRequest;
use FreelancerOnline\Models\categorias;
use FreelancerOnline\Repositories\categoriasRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class categoriasController
 * @package FreelancerOnline\Http\Controllers\API
 */

class categoriasAPIController extends AppBaseController
{
    /** @var  categoriasRepository */
    private $categoriasRepository;

    public function __construct(categoriasRepository $categoriasRepo)
    {
        $this->categoriasRepository = $categoriasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias",
     *      summary="Get a listing of the categorias.",
     *      tags={"categorias"},
     *      description="Get all categorias",
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
     *                  @SWG\Items(ref="#/definitions/categorias")
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
        $this->categoriasRepository->pushCriteria(new RequestCriteria($request));
        $this->categoriasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $categorias = $this->categoriasRepository->all();

        return $this->sendResponse($categorias->toArray(), 'categorias retrieved successfully');
    }

    /**
     * @param CreatecategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/categorias",
     *      summary="Store a newly created categorias in storage",
     *      tags={"categorias"},
     *      description="Store categorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="categorias that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/categorias")
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
     *                  ref="#/definitions/categorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatecategoriasAPIRequest $request)
    {
        $input = $request->all();

        $categorias = $this->categoriasRepository->create($input);

        return $this->sendResponse($categorias->toArray(), 'categorias saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias/{id}",
     *      summary="Display the specified categorias",
     *      tags={"categorias"},
     *      description="Get categorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of categorias",
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
     *                  ref="#/definitions/categorias"
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
        /** @var categorias $categorias */
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            return Response::json(ResponseUtil::makeError('categorias not found'), 400);
        }

        return $this->sendResponse($categorias->toArray(), 'categorias retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatecategoriasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/categorias/{id}",
     *      summary="Update the specified categorias in storage",
     *      tags={"categorias"},
     *      description="Update categorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of categorias",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="categorias that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/categorias")
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
     *                  ref="#/definitions/categorias"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatecategoriasAPIRequest $request)
    {
        $input = $request->all();

        /** @var categorias $categorias */
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            return Response::json(ResponseUtil::makeError('categorias not found'), 400);
        }

        $categorias = $this->categoriasRepository->update($input, $id);

        return $this->sendResponse($categorias->toArray(), 'categorias updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/categorias/{id}",
     *      summary="Remove the specified categorias from storage",
     *      tags={"categorias"},
     *      description="Delete categorias",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of categorias",
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
        /** @var categorias $categorias */
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            return Response::json(ResponseUtil::makeError('categorias not found'), 400);
        }

        $categorias->delete();

        return $this->sendResponse($id, 'categorias deleted successfully');
    }
}
