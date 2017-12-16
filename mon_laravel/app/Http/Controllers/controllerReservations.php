<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class controllerReservations extends Controller
{

	public function affHistorique(){

		$reservations = DB::table('reserver')->OrderBy('idUser')->get();
		return view('historique', compact('reservations'));

	}
    	public function preresPlace(){
	
		$message = '';
		return view('reserverPlace', compact('message'));
	
		
	}

	public function reserverPlace(){
		
		$id = auth()->user()->id;
		$rang = auth()->user()->rang;
		$personnes = DB::table('reserver')->where('idUser', '=', $id)->first();
		$libres = DB::table('place')->where('etat', 0)->count('idPlace');
		if($personnes == null){
			if($rang == NULL){
				if($libres > 0){
					$possible = DB::table('place')->inRandomOrder()->where('etat', '=', 0)->first();
					$numPlace = $possible->numPlace;
					$dateD = date('Y-m-d');
					$dateF = date('Y-m-d');
					DB::table('reserver')->insert(['finPeriode' => $dateF , 'idUser' => $id , 'idPlace' => $numPlace, 'DebutPeriode' => $dateD]);
					DB::table('place')->where('numPlace', '=', $numPlace)->update(['etat' => 1]);
					$message = 'Votre réservation a été réalisé avec succès';
					return view('reserverPlace', compact('message','numPlace'));
				}
				else
					$maxrang = DB::table('users')->max('rang');
					if($maxrang = NULL)
						$maxrang = 0;
					$maxrang = $maxrang+1;
					DB::table('users')->where('id', '=', $id)->update(['rang' => $maxrang]);
					$message = 'Le parking est complet, Vous êtes donc dans la file d\'attente';
					$numPlace = 'pas encore attribué';
					return view('reserverPlace', compact('message','numPlace'));
					
			}
			else{
				$message = 'Vous avez déja un rang dans la file d\'attente';
				$numPlace = auth()->user()->rang;
				return view('reserverPlace', compact('message','numPlace'));
			}
		}
			
		else{
			$possible = DB::table('place')->inRandomOrder()->where('etat', '=', 0)->first();
			$numPlace = $possible->numPlace;
			$message = 'Vous avez déja reserver une place';
			return view('reserverPlace', compact('message','numPlace'));
		}
	}

}
