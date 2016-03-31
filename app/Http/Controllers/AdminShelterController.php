<?php


namespace App\Http\Controllers;


class AdminShelterController extends Controller{


	//'This method returns a directory of sheleters'		
	public function index(){
		return view('admin.shelter.index');
	}

	public function create(){
		return 'This method returns a form from which shelters can be created';	
	}

	public function store(){
		return 'This methods recieves a post request from the form and saves a new shelter to the database';	
	}


	public function show($id){
		return 'This method shows data for a single shelter';	
	}


	public function edit($id){
		return 'This method show a form with editable data for a single shelter';	
	}

	public function update($id){
		return 'This method recieved a post request from the edit form';	
	}

	public function destroy(){
		return 'This method is used to remove a shelter.';	
	}

}
