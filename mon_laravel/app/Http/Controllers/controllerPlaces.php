<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class controllerPlaces extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function affPlaces(){
	
		$places = DB::table('place')->get();
		return view('editPlaces', compact('places'));

	}

	public function creerPlaces(Request $request){
		
		//$this -> validate($request, ['nbp'=>'required|numeric|min:1',]);
		$nbp = $request->input('nbp');
		$cmp = DB::table('place')->max('numPlace');
		for($i = 1 ; $i <= $nbp ; $i++){
			$cmp++;
			DB::table('place')->insert(['numPlace' => $cmp]);
		}
		
		return redirect()->route('editPlaces', 'places');
		

	}

	public function supprimerPlaces($idPlace){
	
		$place = DB::table('place')->get()->where('idPlace', $idPlace)->first();

		if($place)
		{
			$place = DB::table('place')->where('idPlace', '=', $idPlace)->delete();
			$places = DB::table('place')->get();
			return view('editPlaces', compact('places'));
		}

	}
	public function index()
	{
	//
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
	//
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
	//
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
	//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
	//
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
	//
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
	//
	}
}
