<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblMonedasAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblMonedasAPIRequest;
use FreelancerOnline\Models\TblMonedas;
use FreelancerOnline\Repositories\TblMonedasRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblMonedasController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblMonedasAPIController extends AppBaseController
{
    /** @var  TblMonedasRepository */
    private $tblMonedasRepository;

    public function __construct(TblMonedasRepository $tblMonedasRepo)
    {
        $this->tblMonedasRepository = $tblMonedasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblMonedas",
     *      summary="Get a listing of the TblMonedas.",
     *      tags={"TblMonedas"},
     *      description="Get all TblMonedas",
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
     *                  @SWG\Items(ref="#/definitions/TblMonedas")
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
        $this->tblMonedasRepository->pushCriteria(new RequestCriteria($request));
        $this->tblMonedasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblMonedas = $this->tblMonedasRepository->all();

        return $this->sendResponse($tblMonedas->toArray(), 'TblMonedas retrieved successfully');
    }

    /**
     * @param CreateTblMonedasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblMonedas",
     *      summary="Store a newly created TblMonedas in storage",
     *      tags={"TblMonedas"},
     *      description="Store TblMonedas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblMonedas that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblMonedas")
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
     *                  ref="#/definitions/TblMonedas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblMonedasAPIRequest $request)
    {
        $input = $request->all();

        $tblMonedas = $this->tblMonedasRepository->create($input);

        return $this->sendResponse($tblMonedas->toArray(), 'TblMonedas saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblMonedas/{id}",
     *      summary="Display the specified TblMonedas",
     *      tags={"TblMonedas"},
     *      description="Get TblMonedas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMonedas",
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
     *                  ref="#/definitions/TblMonedas"
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
        /** @var TblMonedas $tblMonedas */
        $tblMonedas = $this->tblMonedasRepository->find($id);

        if (empty($tblMonedas)) {
            return Response::json(ResponseUtil::makeError('TblMonedas not found'), 400);
        }

        return $this->sendResponse($tblMonedas->toArray(), 'TblMonedas retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblMonedasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblMonedas/{id}",
     *      summary="Update the specified TblMonedas in storage",
     *      tags={"TblMonedas"},
     *      description="Update TblMonedas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMonedas",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblMonedas that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblMonedas")
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
     *                  ref="#/definitions/TblMonedas"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblMonedasAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblMonedas $tblMonedas */
        $tblMonedas = $this->tblMonedasRepository->find($id);

        if (empty($tblMonedas)) {
            return Response::json(ResponseUtil::makeError('TblMonedas not found'), 400);
        }

        $tblMonedas = $this->tblMonedasRepository->update($input, $id);

        return $this->sendResponse($tblMonedas->toArray(), 'TblMonedas updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblMonedas/{id}",
     *      summary="Remove the specified TblMonedas from storage",
     *      tags={"TblMonedas"},
     *      description="Delete TblMonedas",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMonedas",
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
        /** @var TblMonedas $tblMonedas */
        $tblMonedas = $this->tblMonedasRepository->find($id);

        if (empty($tblMonedas)) {
            return Response::json(ResponseUtil::makeError('TblMonedas not found'), 400);
        }

        $tblMonedas->delete();

        return $this->sendResponse($id, 'TblMonedas deleted successfully');
    }
}
