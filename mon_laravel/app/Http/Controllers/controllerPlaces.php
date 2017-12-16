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

	public function premodifDatePlace($idPlace){
	
		$place = DB::table('place')->get()->where('idPlace',$idPlace)->first();
		return view('modifdatePlace', compact('place'));

	}

	public function modifDatePlace(Request $request, $idPlace){
	
		//$this -> validate($request, ['date'=>'required',]);

		
		$newDate = ($request->input('datef'));
		DB::table('reserver')->where('idPlace', '=', $idPlace)->update(['finPeriode' => $newDate]);
		//$place -> update(['finPeriode'=> ($request->input(datef))]);
		//$places = DB::table('place')->get();
		$places = DB::table('place')->get();
		return view('editPlaces', compact('places'));
		
		
	}


	public function preattribuerPlace($idPlace){

		$place = DB::table('place')->get()->where('idPlace',$idPlace)->first();
		return view('attribuerPlace', compact('place'));

	}

	public function attribuerPlace(Request $request, $idPlace){
		
		$newDated = ($request->input('dated'));
		$newDatef = ($request->input('datef'));
		$newid = ($request->input('iduser'));
		DB::table('reserver')->insert(['finPeriode' => $newDatef, 'idUser' => $newid, 'idPlace' => $idPlace, 'DebutPeriode' => $newDated]);
		DB::table('place')->where('idPlace', '=', $idPlace)->update(['etat' => 1]);
		$places = DB::table('place')->get();
		return view('editPlaces', compact('places'));


	}
}
