<?php


namespace App\Http\Controllers;

// This class provides any json data needed by the main application
class MainController extends Controller{
 

	public function index(){

		//todo, get the locations from postgres
		
		$shelters =  [];


		//if type of user is admin, go to index
		return view('shelter.index');

		// if type of user is shelter employee redirect to shetler
	

		// if type of user is other, redirect to not authorized page
	
	}


	//returns list of shelters 
	public function shelters(){ 	//todo: params lat, long

		return response()-> json(['shelters' => '']);

	}

}

