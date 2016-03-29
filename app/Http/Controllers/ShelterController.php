<?php


namespace App\Http\Controllers;

class ShelterController extends Controller{


	public function index(){

		//todo, go to postgres sql to ge tthe shelters?

		$shelters =  []; //All Shelters


		//if type of user is admin, go to index
		return view('shelter.index');


		// if type of user is shelter employee redirect to shetler
	

		// if type of user is other, redirect to not authorized page
	
	}


	// page for individual shelter
	public function shelter(){

		//route shelter / id ( or slug )

		return view('shelter.shelter');
	}

	/* todo : shleter json requests here */

}

