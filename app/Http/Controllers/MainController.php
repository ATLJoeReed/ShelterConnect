<?php


namespace App\Http\Controllers;
use App\User;
use DB;

//depenency inject request
use Illuminate\Http\Request;

// This class provides any json data needed by the main application
class MainController extends Controller{
 

	public function index(){

		//todo, get the locations from postgres
		
		

		//if type of user is admin, go to index
		return view('main.app');

		// if type of user is shelter employee redirect to shetler
	

		// if type of user is other, redirect to not authorized page
	
	}


	//returns list of shelters
	public function shelters(Request $request){


		$latitude  =  $request->input('lat', 33.7408); 
		$longitude  = $request->input('long', -84.395);
		$limit = 15; // # of nearby results


		$shelters = DB::select( 
			"select * from sc_return_closest_shelters( {$latitude}, {$longitude}, {$limit} )");

		return $shelters;
	}


}

