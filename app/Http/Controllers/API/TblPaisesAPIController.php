<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblPaisesAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblPaisesAPIRequest;
use FreelancerOnline\Models\TblPaises;
use FreelancerOnline\Repositories\TblPaisesRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblPaisesController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblPaisesAPIController extends AppBaseController
{
    /** @var  TblPaisesRepository */
    private $tblPaisesRepository;

    public function __construct(TblPaisesRepository $tblPaisesRepo)
    {
        $this->tblPaisesRepository = $tblPaisesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPaises",
     *      summary="Get a listing of the TblPaises.",
     *      tags={"TblPaises"},
     *      description="Get all TblPaises",
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
     *                  @SWG\Items(ref="#/definitions/TblPaises")
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
        $this->tblPaisesRepository->pushCriteria(new RequestCriteria($request));
        $this->tblPaisesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblPaises = $this->tblPaisesRepository->all();

        return $this->sendResponse($tblPaises->toArray(), 'TblPaises retrieved successfully');
    }

    /**
     * @param CreateTblPaisesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblPaises",
     *      summary="Store a newly created TblPaises in storage",
     *      tags={"TblPaises"},
     *      description="Store TblPaises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPaises that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPaises")
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
     *                  ref="#/definitions/TblPaises"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblPaisesAPIRequest $request)
    {
        $input = $request->all();

        $tblPaises = $this->tblPaisesRepository->create($input);

        return $this->sendResponse($tblPaises->toArray(), 'TblPaises saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPaises/{id}",
     *      summary="Display the specified TblPaises",
     *      tags={"TblPaises"},
     *      description="Get TblPaises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPaises",
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
     *                  ref="#/definitions/TblPaises"
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
        /** @var TblPaises $tblPaises */
        $tblPaises = $this->tblPaisesRepository->find($id);

        if (empty($tblPaises)) {
            return Response::json(ResponseUtil::makeError('TblPaises not found'), 400);
        }

        return $this->sendResponse($tblPaises->toArray(), 'TblPaises retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblPaisesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblPaises/{id}",
     *      summary="Update the specified TblPaises in storage",
     *      tags={"TblPaises"},
     *      description="Update TblPaises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPaises",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPaises that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPaises")
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
     *                  ref="#/definitions/TblPaises"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblPaisesAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblPaises $tblPaises */
        $tblPaises = $this->tblPaisesRepository->find($id);

        if (empty($tblPaises)) {
            return Response::json(ResponseUtil::makeError('TblPaises not found'), 400);
        }

        $tblPaises = $this->tblPaisesRepository->update($input, $id);

        return $this->sendResponse($tblPaises->toArray(), 'TblPaises updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblPaises/{id}",
     *      summary="Remove the specified TblPaises from storage",
     *      tags={"TblPaises"},
     *      description="Delete TblPaises",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPaises",
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
        /** @var TblPaises $tblPaises */
        $tblPaises = $this->tblPaisesRepository->find($id);

        if (empty($tblPaises)) {
            return Response::json(ResponseUtil::makeError('TblPaises not found'), 400);
        }

        $tblPaises->delete();

        return $this->sendResponse($id, 'TblPaises deleted successfully');
    }
}
