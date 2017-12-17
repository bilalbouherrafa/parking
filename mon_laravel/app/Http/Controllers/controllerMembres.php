<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;

class controllerMembres extends Controller
{
	function affMembres(){

		$users = User::All();
		return view('editMembres', compact('users'));
	}

	function affListe(){
	
		$users = User::All()->SortBy('rang')->where('rang', '!=', NULL);
		return view('editListe', compact('users'));
	}
	
	function affPlace(){
		$id = auth()->user()->id;
		$possible = DB::table('reserver')->get()->where('idUser', '=', $id)->first();
		$numPlace = $possible->idPlace;
		$message = 'Vous avez déja reserver une place';
		return view('reserverPlace', compact('message','numPlace'));
	}

	function affRang(){
		$id = auth()->user()->id;
		$possible = DB::table('users')->get()->where('id', '=', $id)->first();
		$rang = $possible->rang;
		$message = 'Votre rang est ';
		return view('afficherRang', compact('message','rang'));
	}

	function delMembres($id){

		$user = User::findOrFail($id);

		if($user)
		{
			$user->delete();
			$users = User::All();
			return view('editMembres', compact('users'));
		}
		//return DB::table('users')->where('id','=', '$id'->delete();
	}
	
	function premdpMembres($id){
	
		$user = User::findOrFail($id);
		return view('premdpMembre', compact('user'));
	
		
	}

	function mdpMembres(Request $request, $id){
		
		$this -> validate($request, ['password'=>'required|string|min:6',]);

		$user = User::findOrFail($id);

		$user -> update(['password'=> Hash::make($request->password)]);
		return redirect()->route('editMembres', $user);
		
		

	}

	function premodifRang($id){
	
		$user = DB::table('users')->get()->where('id',$id)->first();
		$message = '';
		return view('modifRang', compact('user','message'));
	
		
	}

	function modifRang(Request $request, $id){
		
		$newRang = ($request->input('rang'));
		$user = DB::table('users')->get()->where('id',$id)->first();
		$userexistant = DB::table('users')->get()->where('rang',$newRang)->first();
		if($userexistant == NULL){
			if($newRang == 0){
				DB::table('users')->where('id', '=', $id)->update(['rang' => NULL]);
				$users = DB::table('users')->OrderBy('rang')->get()->where('rang', '!=', NULL);
				$message = '';
				return view('editListe', compact('users','message'));
			}
			else if($newRang < 0){
				$message = 'Vous ne pouvez pas attribué ce numéro de rang, car il est négatif';
				$user = DB::table('users')->get()->where('id',$id)->first();
				return view('modifRang', compact('user','message'));
			}
			else{
				DB::table('users')->where('id', '=', $id)->update(['rang' => $newRang]);
				$users = DB::table('users')->OrderBy('rang')->get()->where('rang', '!=', NULL);
				$message = '';
				return view('editListe', compact('users','message'));
			}
		}
		else{
			$message = 'Vous ne pouvez pas attribué ce numéro de rang, car il est déja attribué à un autre utilisateur';
			$user = DB::table('users')->get()->where('id',$id)->first();
			return view('modifRang', compact('user','message'));
		}
			


		
		

	}
}
