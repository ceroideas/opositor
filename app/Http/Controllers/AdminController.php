<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Temas;

class AdminController extends Controller
{
    //
	public function temas_show() {
		$temas = Temas::all();
		return view('admin.temas-home', ['temas' => $temas]);
	}

	public function temas_add() {
		return view('admin.temas_add');
	}

	public function temas_store(Request $request){
		$formFields = $request->validate([
			'title' => ['required', Rule::unique('temas', 'title')]
		]);


		Temas::create($formFields);

		return redirect('/admin/temas-show');
		//return 'Nojoda Carajo';
		//return view('admin.temas_add');
	}
}
