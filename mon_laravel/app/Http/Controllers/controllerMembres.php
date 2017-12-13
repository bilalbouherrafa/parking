<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class controllerMembres extends Controller
{
	function affMembres(){

		$users = User::All();
		return view('editMembres', compact('users'));
	}

	function delMembres($id){

		$users = User::findOrFail($id);

		if($users)
		{
			$users->delete();
			return view('editMembres', compact('users'));
		}
		//return DB::table('users')->where('id','=', '$id'->delete();
	}
}
