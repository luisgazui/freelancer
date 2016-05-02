<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblPalabrasAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblPalabrasAPIRequest;
use FreelancerOnline\Models\TblPalabras;
use FreelancerOnline\Repositories\TblPalabrasRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblPalabrasController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblPalabrasAPIController extends AppBaseController
{
    /** @var  TblPalabrasRepository */
    private $tblPalabrasRepository;

    public function __construct(TblPalabrasRepository $tblPalabrasRepo)
    {
        $this->tblPalabrasRepository = $tblPalabrasRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPalabras",
     *      summary="Get a listing of the TblPalabras.",
     *      tags={"TblPalabras"},
     *      description="Get all TblPalabras",
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
     *                  @SWG\Items(ref="#/definitions/TblPalabras")
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
        $this->tblPalabrasRepository->pushCriteria(new RequestCriteria($request));
        $this->tblPalabrasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblPalabras = $this->tblPalabrasRepository->all();

        return $this->sendResponse($tblPalabras->toArray(), 'TblPalabras retrieved successfully');
    }

    /**
     * @param CreateTblPalabrasAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblPalabras",
     *      summary="Store a newly created TblPalabras in storage",
     *      tags={"TblPalabras"},
     *      description="Store TblPalabras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPalabras that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPalabras")
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
     *                  ref="#/definitions/TblPalabras"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblPalabrasAPIRequest $request)
    {
        $input = $request->all();

        $tblPalabras = $this->tblPalabrasRepository->create($input);

        return $this->sendResponse($tblPalabras->toArray(), 'TblPalabras saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblPalabras/{id}",
     *      summary="Display the specified TblPalabras",
     *      tags={"TblPalabras"},
     *      description="Get TblPalabras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPalabras",
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
     *                  ref="#/definitions/TblPalabras"
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
        /** @var TblPalabras $tblPalabras */
        $tblPalabras = $this->tblPalabrasRepository->find($id);

        if (empty($tblPalabras)) {
            return Response::json(ResponseUtil::makeError('TblPalabras not found'), 400);
        }

        return $this->sendResponse($tblPalabras->toArray(), 'TblPalabras retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblPalabrasAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblPalabras/{id}",
     *      summary="Update the specified TblPalabras in storage",
     *      tags={"TblPalabras"},
     *      description="Update TblPalabras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPalabras",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblPalabras that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblPalabras")
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
     *                  ref="#/definitions/TblPalabras"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblPalabrasAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblPalabras $tblPalabras */
        $tblPalabras = $this->tblPalabrasRepository->find($id);

        if (empty($tblPalabras)) {
            return Response::json(ResponseUtil::makeError('TblPalabras not found'), 400);
        }

        $tblPalabras = $this->tblPalabrasRepository->update($input, $id);

        return $this->sendResponse($tblPalabras->toArray(), 'TblPalabras updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblPalabras/{id}",
     *      summary="Remove the specified TblPalabras from storage",
     *      tags={"TblPalabras"},
     *      description="Delete TblPalabras",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblPalabras",
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
        /** @var TblPalabras $tblPalabras */
        $tblPalabras = $this->tblPalabrasRepository->find($id);

        if (empty($tblPalabras)) {
            return Response::json(ResponseUtil::makeError('TblPalabras not found'), 400);
        }

        $tblPalabras->delete();

        return $this->sendResponse($id, 'TblPalabras deleted successfully');
    }
}
