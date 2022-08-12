<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Temas;
use App\Models\Subtemas;
use App\Models\Questions;

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

	public function subtema_view($tema_id, $subtema_id) {

		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);
		//$questions = Questions::all();
		$questions = Questions::where('section_id', $subtema->id)->get();

		return view('admin.subtema_view', [
			'tema' => $tema,
			'subtema' => $subtema,
			'questions' => $questions
		]);
	}

	public function question_add($tema_id, $subtema_id) {
		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);

		return view('admin.questions-add', [
			'tema' => $tema,
			'subtema' => $subtema
		]);
	}

	public function question_store(Request $request, $tema_id, $subtema_id) {
		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);


		switch($subtema->type) {
			case "true_or_false":

				// Check if there's already a question
				$q = Questions::where('section_id', $subtema->id)->get();

				if(count($q) > 0) {
					return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)
						->with('error', 'Los subtemas de tipo "verdadero y falso" solo pueden tener una pregunta y respuesta');
					
				}

				$formFields = $request->validate([
					'question' => 'required',
					'answer' => 'required',
				]);
				break;

			case "flashcards":

				// Check if there's already a question
				$q = Questions::where('section_id', $subtema->id)->get();

				if(count($q) > 0) {
					return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)
						->with('error', 'Los subtemas de tipo "flashcards" solo pueden tener una pregunta y respuesta');
				}

				$formFields = $request->validate([
					'answer' => 'required',
					'question' => 'required',
				]);
				break;

			case "multiple_choice":

				/*
				// Check if there's already a question
				$q = Questions::where('section_id', $subtema->id)->get();

				if(count($q) > 0) {
					return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)
						->with('error', 'Los subtemas de tipo "flashcards" solo pueden tener una pregunta y respuesta');
				}
				 */

				$formFields = $request->validate([
					'question' => 'required',
					'answer-1' => 'required',
					'answer-2' => 'required',
					'answer-3' => 'required',
					'answer-4' => 'required'
				]);

				$datas = [
					[$formFields->question, 'question'],
					['answer-1', $formFields->answer_1],
					['answer-2', $formFields->answer_2],
					['answer-3', $formFields->answer_3],
					['answer-4', $formFields->answer_4],
				]

				forEach($data as $datas) {
					Questions::create([
						'section_id' => $subtema->id,
						'question' => ''
					]);
				}

				break;
		}

		$formFields['section_id'] = $subtema->id;

		Questions::create($formFields);

		return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id);

	}
}
