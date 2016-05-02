<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblMascaraAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblMascaraAPIRequest;
use FreelancerOnline\Models\TblMascara;
use FreelancerOnline\Repositories\TblMascaraRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblMascaraController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblMascaraAPIController extends AppBaseController
{
    /** @var  TblMascaraRepository */
    private $tblMascaraRepository;

    public function __construct(TblMascaraRepository $tblMascaraRepo)
    {
        $this->tblMascaraRepository = $tblMascaraRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblMascaras",
     *      summary="Get a listing of the TblMascaras.",
     *      tags={"TblMascara"},
     *      description="Get all TblMascaras",
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
     *                  @SWG\Items(ref="#/definitions/TblMascara")
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
        $this->tblMascaraRepository->pushCriteria(new RequestCriteria($request));
        $this->tblMascaraRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblMascaras = $this->tblMascaraRepository->all();

        return $this->sendResponse($tblMascaras->toArray(), 'TblMascaras retrieved successfully');
    }

    /**
     * @param CreateTblMascaraAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblMascaras",
     *      summary="Store a newly created TblMascara in storage",
     *      tags={"TblMascara"},
     *      description="Store TblMascara",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblMascara that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblMascara")
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
     *                  ref="#/definitions/TblMascara"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblMascaraAPIRequest $request)
    {
        $input = $request->all();

        $tblMascaras = $this->tblMascaraRepository->create($input);

        return $this->sendResponse($tblMascaras->toArray(), 'TblMascara saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblMascaras/{id}",
     *      summary="Display the specified TblMascara",
     *      tags={"TblMascara"},
     *      description="Get TblMascara",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMascara",
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
     *                  ref="#/definitions/TblMascara"
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
        /** @var TblMascara $tblMascara */
        $tblMascara = $this->tblMascaraRepository->find($id);

        if (empty($tblMascara)) {
            return Response::json(ResponseUtil::makeError('TblMascara not found'), 400);
        }

        return $this->sendResponse($tblMascara->toArray(), 'TblMascara retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblMascaraAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblMascaras/{id}",
     *      summary="Update the specified TblMascara in storage",
     *      tags={"TblMascara"},
     *      description="Update TblMascara",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMascara",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblMascara that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblMascara")
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
     *                  ref="#/definitions/TblMascara"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblMascaraAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblMascara $tblMascara */
        $tblMascara = $this->tblMascaraRepository->find($id);

        if (empty($tblMascara)) {
            return Response::json(ResponseUtil::makeError('TblMascara not found'), 400);
        }

        $tblMascara = $this->tblMascaraRepository->update($input, $id);

        return $this->sendResponse($tblMascara->toArray(), 'TblMascara updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblMascaras/{id}",
     *      summary="Remove the specified TblMascara from storage",
     *      tags={"TblMascara"},
     *      description="Delete TblMascara",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblMascara",
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
        /** @var TblMascara $tblMascara */
        $tblMascara = $this->tblMascaraRepository->find($id);

        if (empty($tblMascara)) {
            return Response::json(ResponseUtil::makeError('TblMascara not found'), 400);
        }

        $tblMascara->delete();

        return $this->sendResponse($id, 'TblMascara deleted successfully');
    }
}
