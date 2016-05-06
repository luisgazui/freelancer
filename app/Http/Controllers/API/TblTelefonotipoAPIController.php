<?php

namespace FreelancerOnline\Http\Controllers\API;

use FreelancerOnline\Http\Requests\API\CreateTblTelefonotipoAPIRequest;
use FreelancerOnline\Http\Requests\API\UpdateTblTelefonotipoAPIRequest;
use FreelancerOnline\Models\TblTelefonotipo;
use FreelancerOnline\Repositories\TblTelefonotipoRepository;
use Illuminate\Http\Request;
use FreelancerOnline\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TblTelefonotipoController
 * @package FreelancerOnline\Http\Controllers\API
 */

class TblTelefonotipoAPIController extends AppBaseController
{
    /** @var  TblTelefonotipoRepository */
    private $tblTelefonotipoRepository;

    public function __construct(TblTelefonotipoRepository $tblTelefonotipoRepo)
    {
        $this->tblTelefonotipoRepository = $tblTelefonotipoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTelefonotipos",
     *      summary="Get a listing of the TblTelefonotipos.",
     *      tags={"TblTelefonotipo"},
     *      description="Get all TblTelefonotipos",
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
     *                  @SWG\Items(ref="#/definitions/TblTelefonotipo")
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
        $this->tblTelefonotipoRepository->pushCriteria(new RequestCriteria($request));
        $this->tblTelefonotipoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tblTelefonotipos = $this->tblTelefonotipoRepository->all();

        return $this->sendResponse($tblTelefonotipos->toArray(), 'TblTelefonotipos retrieved successfully');
    }

    /**
     * @param CreateTblTelefonotipoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tblTelefonotipos",
     *      summary="Store a newly created TblTelefonotipo in storage",
     *      tags={"TblTelefonotipo"},
     *      description="Store TblTelefonotipo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTelefonotipo that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTelefonotipo")
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
     *                  ref="#/definitions/TblTelefonotipo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTblTelefonotipoAPIRequest $request)
    {
        $input = $request->all();

        $tblTelefonotipos = $this->tblTelefonotipoRepository->create($input);

        return $this->sendResponse($tblTelefonotipos->toArray(), 'TblTelefonotipo saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tblTelefonotipos/{id}",
     *      summary="Display the specified TblTelefonotipo",
     *      tags={"TblTelefonotipo"},
     *      description="Get TblTelefonotipo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTelefonotipo",
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
     *                  ref="#/definitions/TblTelefonotipo"
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
        /** @var TblTelefonotipo $tblTelefonotipo */
        $tblTelefonotipo = $this->tblTelefonotipoRepository->find($id);

        if (empty($tblTelefonotipo)) {
            return Response::json(ResponseUtil::makeError('TblTelefonotipo not found'), 400);
        }

        return $this->sendResponse($tblTelefonotipo->toArray(), 'TblTelefonotipo retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTblTelefonotipoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tblTelefonotipos/{id}",
     *      summary="Update the specified TblTelefonotipo in storage",
     *      tags={"TblTelefonotipo"},
     *      description="Update TblTelefonotipo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTelefonotipo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TblTelefonotipo that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TblTelefonotipo")
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
     *                  ref="#/definitions/TblTelefonotipo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTblTelefonotipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TblTelefonotipo $tblTelefonotipo */
        $tblTelefonotipo = $this->tblTelefonotipoRepository->find($id);

        if (empty($tblTelefonotipo)) {
            return Response::json(ResponseUtil::makeError('TblTelefonotipo not found'), 400);
        }

        $tblTelefonotipo = $this->tblTelefonotipoRepository->update($input, $id);

        return $this->sendResponse($tblTelefonotipo->toArray(), 'TblTelefonotipo updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tblTelefonotipos/{id}",
     *      summary="Remove the specified TblTelefonotipo from storage",
     *      tags={"TblTelefonotipo"},
     *      description="Delete TblTelefonotipo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TblTelefonotipo",
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
        /** @var TblTelefonotipo $tblTelefonotipo */
        $tblTelefonotipo = $this->tblTelefonotipoRepository->find($id);

        if (empty($tblTelefonotipo)) {
            return Response::json(ResponseUtil::makeError('TblTelefonotipo not found'), 400);
        }

        $tblTelefonotipo->delete();

        return $this->sendResponse($id, 'TblTelefonotipo deleted successfully');
    }
}
