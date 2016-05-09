<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreatetblCodpaisAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdatetblCodpaisAPIRequest;
use FreelancerOnline\Models\tblCodpais;
use FreelancerOnline\Repositories\tblCodpaisRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class tblCodpaisController
 * @package FreelancerOnline\Http\Controllers\API
 */

class tblCodpaisAPIController extends AppBaseController
{
    /** @var  tblCodpaisRepository */
    private $tblCodpaisRepository;

    public function __construct(tblCodpaisRepository $tblCodpaisRepo)
    {
        $this->tblCodpaisRepository = $tblCodpaisRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCodpais",
     *      summary="Get a listing of the tblCodpais.",
     *      tags={"tblCodpais"},
     *      description="Get all tblCodpais",
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
     *                  @SWG\Items(ref="#/definitions/tblCodpais")
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
        $this->tblCodpaisRepository->pushCriteria(new RequestCriteria($request));
        $this->tblCodpaisRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblCodpais = $this->tblCodpaisRepository->all();

        return $this->sendResponse($tblCodpais->toArray(), 'tblCodpais retrieved successfully');
    }

    /**
     * @param CreatetblCodpaisAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblCodpais",
     *      summary="Store a newly created tblCodpais in storage",
     *      tags={"tblCodpais"},
     *      description="Store tblCodpais",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tblCodpais that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tblCodpais")
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
     *                  ref="#/definitions/tblCodpais"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatetblCodpaisAPIRequest $request)
    {
        $input = $request->all();

        $tblCodpais = $this->tblCodpaisRepository->create($input);

        return $this->sendResponse($tblCodpais->toArray(), 'tblCodpais saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblCodpais/{id}",
     *      summary="Display the specified tblCodpais",
     *      tags={"tblCodpais"},
     *      description="Get tblCodpais",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCodpais",
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
     *                  ref="#/definitions/tblCodpais"
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
        /** @var tblCodpais $tblCodpais */
        $tblCodpais = $this->tblCodpaisRepository->find($id);

        if (empty($tblCodpais)) {
            return Response::json(ResponseUtil::makeError('tblCodpais not found'), 400);
        }

        return $this->sendResponse($tblCodpais->toArray(), 'tblCodpais retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatetblCodpaisAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblCodpais/{id}",
     *      summary="Update the specified tblCodpais in storage",
     *      tags={"tblCodpais"},
     *      description="Update tblCodpais",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCodpais",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tblCodpais that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tblCodpais")
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
     *                  ref="#/definitions/tblCodpais"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatetblCodpaisAPIRequest $request)
    {
        $input = $request->all();

        /** @var tblCodpais $tblCodpais */
        $tblCodpais = $this->tblCodpaisRepository->find($id);

        if (empty($tblCodpais)) {
            return Response::json(ResponseUtil::makeError('tblCodpais not found'), 400);
        }

        $tblCodpais = $this->tblCodpaisRepository->update($input, $id);

        return $this->sendResponse($tblCodpais->toArray(), 'tblCodpais updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblCodpais/{id}",
     *      summary="Remove the specified tblCodpais from storage",
     *      tags={"tblCodpais"},
     *      description="Delete tblCodpais",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tblCodpais",
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
        /** @var tblCodpais $tblCodpais */
        $tblCodpais = $this->tblCodpaisRepository->find($id);

        if (empty($tblCodpais)) {
            return Response::json(ResponseUtil::makeError('tblCodpais not found'), 400);
        }

        $tblCodpais->delete();

        return $this->sendResponse($id, 'tblCodpais deleted successfully');
    }
}
