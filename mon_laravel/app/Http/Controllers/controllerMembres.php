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
}
