<?php

namespace FreelancerOnline\Http\Controllers;

use FreelancerOnline\DataTables\userDataTable;
use FreelancerOnline\Http\Requests;
use FreelancerOnline\Http\Requests\CreateuserRequest;
use FreelancerOnline\Http\Requests\UpdateuserRequest;
use FreelancerOnline\Repositories\userRepository;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Response;
use FreelancerOnline\Models\TblPaises;
use FreelancerOnline\Models\TblTipousuario;
use FreelancerOnline\Models\TblDocumentos;

class userController extends AppBaseController
{
    /** @var  userRepository */
    private $userRepository;

    public function __construct(userRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the user.
     *
     * @param userDataTable $userDataTable
     * @return Response
     */
    public function index(userDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        $pais = TblPaises::lists('Nombre','id');
        $tusuario = TblTipousuario::lists('tipou','id');
        return view('users.create', compact('pais','tusuario'));
    }

    public function getdocumentos($id,$id1){
        //if($request->ajax()){
            $documentos = TblDocumentos::documentos($id,$id1);
            return response()->json($documentos);
        //}
    }    
    /**
     * Store a newly created user in storage.
     *
     * @param CreateuserRequest $request
     *
     * @return Response
     */
    public function store(CreateuserRequest $request)
    {
        //$input = $request->all();

        //$user = $this->userRepository->create($input);

        //Flash::success('user saved successfully.');

        //$user = New User;
        \FreelancerOnline\Models\user::create([
            'name'            => $request['name'],
            'lastname'        => $request['lastname'],
            'documentoi'      => $request['documentoi'],
            'Direccion'       => $request['Direccion'],
            'email'           => $request['email'],
            'password'        => bcrypt($request['password']),
            'documento_id'    => $request['documento_id'],
            'tipousuario_id'  => $request['tipousuario_id'],
            'pais_id'         => $request['pais_id'],
        ]);

        return redirect(route('/home'));
    }

    /**
     * Display the specified user.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('register.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('register.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int              $id
     * @param UpdateuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('register.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('user updated successfully.');

        return redirect(route('register.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('user not found');

            return redirect(route('register.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('user deleted successfully.');

        return redirect(route('register.index'));
    }
}
