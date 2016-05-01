<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreatepaisesAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdatepaisesAPIRequest;
use FreelancerOnline\Models\paises;
use FreelancerOnline\Repositories\paisesRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class paisesController
 * @package FreelancerOnline\Http\Controllers\API
 */

class paisesAPIController extends AppBaseController
{
    /** @var  paisesRepository */
    private $paisesRepository;

    public function __construct(paisesRepository $paisesRepo)
    {
        $this->paisesRepository = $paisesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/paises",
     *      summary="Get a listing of the paises.",
     *      tags={"paises"},
     *      description="Get all paises",
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
     *                  @SWG\Items(ref="#/definitions/paises")
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
        $this->paisesRepository->pushCriteria(new RequestCriteria($request));
        $this->paisesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $paises = $this->paisesRepository->all();

        return $this->sendResponse($paises->toArray(), 'paises retrieved successfully');
    }

    /**
     * @param CreatepaisesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/paises",
     *      summary="Store a newly created paises in storage",
     *      tags={"paises"},
     *      description="Store paises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="paises that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/paises")
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
     *                  ref="#/definitions/paises"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatepaisesAPIRequest $request)
    {
        $input = $request->all();

        $paises = $this->paisesRepository->create($input);

        return $this->sendResponse($paises->toArray(), 'paises saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/paises/{id}",
     *      summary="Display the specified paises",
     *      tags={"paises"},
     *      description="Get paises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of paises",
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
     *                  ref="#/definitions/paises"
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
        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return Response::json(ResponseUtil::makeError('paises not found'), 400);
        }

        return $this->sendResponse($paises->toArray(), 'paises retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatepaisesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/paises/{id}",
     *      summary="Update the specified paises in storage",
     *      tags={"paises"},
     *      description="Update paises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of paises",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="paises that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/paises")
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
     *                  ref="#/definitions/paises"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatepaisesAPIRequest $request)
    {
        $input = $request->all();

        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return Response::json(ResponseUtil::makeError('paises not found'), 400);
        }

        $paises = $this->paisesRepository->update($input, $id);

        return $this->sendResponse($paises->toArray(), 'paises updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/paises/{id}",
     *      summary="Remove the specified paises from storage",
     *      tags={"paises"},
     *      description="Delete paises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of paises",
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
        /** @var paises $paises */
        $paises = $this->paisesRepository->find($id);

        if (empty($paises)) {
            return Response::json(ResponseUtil::makeError('paises not found'), 400);
        }

        $paises->delete();

        return $this->sendResponse($id, 'paises deleted successfully');
    }
}
