<?php

class UtilisateurController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $tweet;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function index($user_id)
	{
		$userData = $this->user->where('users.id','=',$user_id)->get();
		return View::make('profil.informations.index',compact('userData'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return View::make('profil.informations.create')->with('id',$id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, InformationsPerso::$rules);

		if ($validation->passes())
		{
			$this->informationsPerso->create($input);

			return Redirect::route('informationsPersos.index');
		}

		return Redirect::route('informationsPersos.create')
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$informationsPerso = $this->informationsPerso->findOrFail($id);

		return View::make('informationsPersos.show', compact('informationsPerso'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$informationsPerso = $this->informationsPerso->find($id);

		if (is_null($informationsPerso))
		{
			return Redirect::route('informationsPersos.index');
		}

		return View::make('informationsPersos.edit', compact('informationsPerso'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, InformationsPerso::$rules);

		if ($validation->passes())
		{
			$informationsPerso = $this->informationsPerso->find($id);
			$informationsPerso->update($input);

			return Redirect::route('informationsPersos.show', $id);
		}

		return Redirect::route('informationsPersos.edit', $id)
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->informationsPerso->find($id)->delete();

		return Redirect::route('informationsPersos.index');
	}

}