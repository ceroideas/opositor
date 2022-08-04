<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Temas;
use App\Models\Subtemas;

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

	public function temas_single($id) {
		//return view('admin.temas_add');
		$tema = Temas::findOrFail($id);
		$subtemas = Subtemas::where('tema_id', $id)->get();
		return view('admin.temas-single', ['tema' => $tema, 'subtemas' => $subtemas]);
	}

	public function temas_store(Request $request){
		$formFields = $request->validate([
			'title' => ['required', Rule::unique('temas', 'title')]
		]);


		Temas::create($formFields);

		return redirect('/admin/temas-show');
	}

	public function temas_add_subtema($id) {
		$tema = Temas::findOrFail($id);
		return view('admin.temas_add_subtema', ['tema' => $tema]);
	}

	public function subtema_store(Request $request,$id) {
		$tema = Temas::findOrFail($id);

		$formFields = $request->validate([
			'title' => ['required', Rule::unique('tema_seccion', 'title')],
			'type' => 'required',
			'difficulty' => 'required',
			'description' => 'required'
		]);

		$formFields['tema_id'] = $id;

		Subtemas::create($formFields);

		return redirect('/admin/temas/' . $id);

	}
}
