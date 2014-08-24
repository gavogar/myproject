<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('books.index');

	}

	public function getBooks()
	{
		$users = Usuarios::all();

		return Response::json($users);
		
	}

	public function postBooks(){
			
			$rules = array(
				'nombre' => 'required',
				'apellido' => 'required'
			);
			
			$validator = Validator::make(Input::all(), $rules);
			
			if ($validator->fails()) {
				
				$message = "Algo no anda bien";
				return Response::json($message, 403);
				
			} else {
				
				$user = Input::all();
			
				$usuario = new Usuarios;
				$usuario->nombre = $user['nombre'];
				$usuario->save();
				
				$message = "Se ha insertado correctamente";
				return Response::json($message, 200);
			}
			
			
			
			
		
			
	}
}
