<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function index()
    {
        return view('welcome');
    }


    public function waitroom()
    {

	switch(Auth::user()->role) {
		case 'admin':
			return redirect('/admin');
			break;	

		case 'user':
			return redirect('/dashboard');
			break;	
	}

    }
}
