<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateexperienciaAPIRequest;
use App\Http\Requests\API\UpdateexperienciaAPIRequest;
use App\Models\experiencia;
use App\Repositories\experienciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class experienciaController
 * @package App\Http\Controllers\API
 */

class experienciaAPIController extends AppBaseController
{
    /** @var  experienciaRepository */
    private $experienciaRepository;

    public function __construct(experienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias",
     *      summary="Get a listing of the experiencias.",
     *      tags={"experiencia"},
     *      description="Get all experiencias",
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
     *                  @SWG\Items(ref="#/definitions/experiencia")
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
        $this->experienciaRepository->pushCriteria(new RequestCriteria($request));
        $this->experienciaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $experiencias = $this->experienciaRepository->all();

        return $this->sendResponse($experiencias->toArray(), 'experiencias retrieved successfully');
    }

    /**
     * @param CreateexperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/experiencias",
     *      summary="Store a newly created experiencia in storage",
     *      tags={"experiencia"},
     *      description="Store experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="experiencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/experiencia")
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
     *                  ref="#/definitions/experiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateexperienciaAPIRequest $request)
    {
        $input = $request->all();

        $experiencias = $this->experienciaRepository->create($input);

        return $this->sendResponse($experiencias->toArray(), 'experiencia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias/{id}",
     *      summary="Display the specified experiencia",
     *      tags={"experiencia"},
     *      description="Get experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of experiencia",
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
     *                  ref="#/definitions/experiencia"
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
        /** @var experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return Response::json(ResponseUtil::makeError('experiencia not found'), 400);
        }

        return $this->sendResponse($experiencia->toArray(), 'experiencia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateexperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/experiencias/{id}",
     *      summary="Update the specified experiencia in storage",
     *      tags={"experiencia"},
     *      description="Update experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of experiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="experiencia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/experiencia")
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
     *                  ref="#/definitions/experiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateexperienciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return Response::json(ResponseUtil::makeError('experiencia not found'), 400);
        }

        $experiencia = $this->experienciaRepository->update($input, $id);

        return $this->sendResponse($experiencia->toArray(), 'experiencia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/experiencias/{id}",
     *      summary="Remove the specified experiencia from storage",
     *      tags={"experiencia"},
     *      description="Delete experiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of experiencia",
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
        /** @var experiencia $experiencia */
        $experiencia = $this->experienciaRepository->find($id);

        if (empty($experiencia)) {
            return Response::json(ResponseUtil::makeError('experiencia not found'), 400);
        }

        $experiencia->delete();

        return $this->sendResponse($id, 'experiencia deleted successfully');
    }
}
