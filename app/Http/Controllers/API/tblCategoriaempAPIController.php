<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreatetblCategoriaempAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdatetblCategoriaempAPIRequest;
use FreelancerOnline\Models\tblCategoriaemp;
use FreelancerOnline\Repositories\tblCategoriaempRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class tblCategoriaempController
 * @package FreelancerOnline\Http\Controllers\API
 */

class tblCategoriaempAPIController extends AppBaseController
{
    /** @var  tblCategoriaempRepository */
    private $tblCategoriaempRepository;

    public function __construct(tblCategoriaempRepository $tblCategoriaempRepo)
    {
        $this->tblCategoriaempRepository = $tblCategoriaempRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCategoriaemps",
     *      summary="Get a listing of the tblCategoriaemps.",
     *      tags={"tblCategoriaemp"},
     *      description="Get all tblCategoriaemps",
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
     *                  @SWG\Items(ref="#/definitions/tblCategoriaemp")
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
        $this->tblCategoriaempRepository->pushCriteria(new RequestCriteria($request));
        $this->tblCategoriaempRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblCategoriaemps = $this->tblCategoriaempRepository->all();

        return $this->sendResponse($tblCategoriaemps->toArray(), 'tblCategoriaemps retrieved successfully');
    }

    /**
     * @param CreatetblCategoriaempAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblCategoriaemps",
     *      summary="Store a newly created tblCategoriaemp in storage",
     *      tags={"tblCategoriaemp"},
     *      description="Store tblCategoriaemp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tblCategoriaemp that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tblCategoriaemp")
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
     *                  ref="#/definitions/tblCategoriaemp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatetblCategoriaempAPIRequest $request)
    {
        $input = $request->all();

        $tblCategoriaemps = $this->tblCategoriaempRepository->create($input);

        return $this->sendResponse($tblCategoriaemps->toArray(), 'tblCategoriaemp saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCategoriaemps/{id}",
     *      summary="Display the specified tblCategoriaemp",
     *      tags={"tblCategoriaemp"},
     *      description="Get tblCategoriaemp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCategoriaemp",
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
     *                  ref="#/definitions/tblCategoriaemp"
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
        /** @var tblCategoriaemp $tblCategoriaemp */
        $tblCategoriaemp = $this->tblCategoriaempRepository->find($id);

        if (empty($tblCategoriaemp)) {
            return Response::json(ResponseUtil::makeError('tblCategoriaemp not found'), 400);
        }

        return $this->sendResponse($tblCategoriaemp->toArray(), 'tblCategoriaemp retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatetblCategoriaempAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblCategoriaemps/{id}",
     *      summary="Update the specified tblCategoriaemp in storage",
     *      tags={"tblCategoriaemp"},
     *      description="Update tblCategoriaemp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCategoriaemp",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tblCategoriaemp that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tblCategoriaemp")
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
     *                  ref="#/definitions/tblCategoriaemp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatetblCategoriaempAPIRequest $request)
    {
        $input = $request->all();

        /** @var tblCategoriaemp $tblCategoriaemp */
        $tblCategoriaemp = $this->tblCategoriaempRepository->find($id);

        if (empty($tblCategoriaemp)) {
            return Response::json(ResponseUtil::makeError('tblCategoriaemp not found'), 400);
        }

        $tblCategoriaemp = $this->tblCategoriaempRepository->update($input, $id);

        return $this->sendResponse($tblCategoriaemp->toArray(), 'tblCategoriaemp updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblCategoriaemps/{id}",
     *      summary="Remove the specified tblCategoriaemp from storage",
     *      tags={"tblCategoriaemp"},
     *      description="Delete tblCategoriaemp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCategoriaemp",
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
        /** @var tblCategoriaemp $tblCategoriaemp */
        $tblCategoriaemp = $this->tblCategoriaempRepository->find($id);

        if (empty($tblCategoriaemp)) {
            return Response::json(ResponseUtil::makeError('tblCategoriaemp not found'), 400);
        }

        $tblCategoriaemp->delete();

        return $this->sendResponse($id, 'tblCategoriaemp deleted successfully');
    }
}
