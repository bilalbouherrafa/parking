<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		if(Auth::user()->admin)
	       		return view('admin');

		else{
			$id = Auth::user()->id;
			$existReserv = DB::table('reserver')->get()->where('idUser',$id)->first();
			$existRang = DB::table('users')->get()->where('id', $id)->where('rang', !NULL)->first();
			//$existRang = User::where('rang', '!=', NULL);
			if($existRang == NULL)
				$existRang = 'faux';
			return view('home', compact('existReserv','existRang'));
		}
	}
}
