<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreatebancosAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdatebancosAPIRequest;
use FreelancerOnline\Models\bancos;
use FreelancerOnline\Repositories\bancosRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class bancosController
 * @package FreelancerOnline\Http\Controllers\API
 */

class bancosAPIController extends AppBaseController
{
    /** @var  bancosRepository */
    private $bancosRepository;

    public function __construct(bancosRepository $bancosRepo)
    {
        $this->bancosRepository = $bancosRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/bancos",
     *      summary="Get a listing of the bancos.",
     *      tags={"bancos"},
     *      description="Get all bancos",
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
     *                  @SWG\Items(ref="#/definitions/bancos")
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
        $this->bancosRepository->pushCriteria(new RequestCriteria($request));
        $this->bancosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bancos = $this->bancosRepository->all();

        return $this->sendResponse($bancos->toArray(), 'bancos retrieved successfully');
    }

    /**
     * @param CreatebancosAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/bancos",
     *      summary="Store a newly created bancos in storage",
     *      tags={"bancos"},
     *      description="Store bancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="bancos that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/bancos")
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
     *                  ref="#/definitions/bancos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatebancosAPIRequest $request)
    {
        $input = $request->all();

        $bancos = $this->bancosRepository->create($input);

        return $this->sendResponse($bancos->toArray(), 'bancos saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/bancos/{id}",
     *      summary="Display the specified bancos",
     *      tags={"bancos"},
     *      description="Get bancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of bancos",
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
     *                  ref="#/definitions/bancos"
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
        /** @var bancos $bancos */
        $bancos = $this->bancosRepository->find($id);

        if (empty($bancos)) {
            return Response::json(ResponseUtil::makeError('bancos not found'), 400);
        }

        return $this->sendResponse($bancos->toArray(), 'bancos retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatebancosAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/bancos/{id}",
     *      summary="Update the specified bancos in storage",
     *      tags={"bancos"},
     *      description="Update bancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of bancos",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="bancos that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/bancos")
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
     *                  ref="#/definitions/bancos"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatebancosAPIRequest $request)
    {
        $input = $request->all();

        /** @var bancos $bancos */
        $bancos = $this->bancosRepository->find($id);

        if (empty($bancos)) {
            return Response::json(ResponseUtil::makeError('bancos not found'), 400);
        }

        $bancos = $this->bancosRepository->update($input, $id);

        return $this->sendResponse($bancos->toArray(), 'bancos updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/bancos/{id}",
     *      summary="Remove the specified bancos from storage",
     *      tags={"bancos"},
     *      description="Delete bancos",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of bancos",
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
        /** @var bancos $bancos */
        $bancos = $this->bancosRepository->find($id);

        if (empty($bancos)) {
            return Response::json(ResponseUtil::makeError('bancos not found'), 400);
        }

        $bancos->delete();

        return $this->sendResponse($id, 'bancos deleted successfully');
    }
}
