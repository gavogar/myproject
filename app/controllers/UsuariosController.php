<?php

class UsuariosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuario = Usuarios::all();

		return View::make('usuarios.index')->with('usuario', $usuario);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarios.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'nombre' => 'required',
			'apellido' => 'required'
			
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$usuario = new Usuarios;
			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
			$usuario->save();

			// redirect
			Session::flash('message', 'Successfully created usuario!');
			return Redirect::to('usuarios');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// get the nerd
		$usuario = Usuarios::find($id);

		// show the view and pass the nerd to it
		return View::make('usuarios.show')->with('usuario', $usuario);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$usuario = Usuarios::find($id);

		// show the edit form and pass the nerd
		return View::make('usuarios.edit')->with('usuario', $usuario);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'nombre'=>'required',
			'apellido'=>'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarios/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$usuario = Usuarios::find($id);
			$usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
			$usuario->save();

			// redirect
			Session::flash('message', 'Successfully updated nerd!');
			return Redirect::to('usuarios');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$usuario = Usuarios::find($id);
		$usuario->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('usuarios');
	}


}
