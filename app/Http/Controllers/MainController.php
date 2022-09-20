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
        return Auth::user()->role;
    }
}
