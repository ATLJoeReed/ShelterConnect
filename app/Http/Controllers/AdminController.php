\<?php


namespace App\Http\Controllers;

// This class provides all views and/or json data to support the admin panel
class MainController extends Controller{
 

	public function main(){

		//todo, get any supporting data from postgres
		
		$shelters =  [];

		//if type of user is admin, go to index
		return view('main.app');

	}


}

