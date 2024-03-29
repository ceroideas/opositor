<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
	public function index() {
		return view('user.home');
	}

	public function mis_temas() {
		$mis_temas = [];
		return view('user.mis_temas', ['mis_temas' => $mis_temas]);
	}

	public function temas() {
		$temas = [];
		return view('user.temas', ['temas' => $temas]);
	}

	public function tema_single() {
		$temas = [];
		return view('user.tema_single', ['temas' => $temas]);
	}
}
