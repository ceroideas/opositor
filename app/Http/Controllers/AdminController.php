<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Temas;
use App\Models\Subtemas;
use App\Models\Questions;

class AdminController extends Controller
{
	public function temas_show() {
		$temas = Temas::all();

		foreach ($temas as $tema){
			$tema['subtemas'] = Subtemas::where('tema_id', $tema->id)->get();
		} 	

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

		return redirect('/admin/temas-show')->with('success', 'Tema creado excitosamente');
	}

	public function temas_add_subtema($id) {
		$tema = Temas::findOrFail($id);
		return view('admin.temas_add_subtema', ['tema' => $tema]);
	}

	public function temas_destroy_subtema($id, $subtema_id, Request $request) {
		$tema = Temas::findOrFail($id);
		$subtema = Subtemas::findOrFail($subtema_id);
		
		Questions::where('section_id', $subtema_id)->delete();

		//Temas::destroy($id);
		Subtemas::destroy($subtema_id);

		return redirect('/admin/temas/' . $id)->with('success', 'Subtema eliminado excitosamente');
	}

	public function temas_update_subtema($id, $subtema_id, Request $request) {

		$formFields = $request->validate([
			'title' => ['required', Rule::unique('tema_seccion', 'title')],
			'status' => 'required',
			'difficulty' => 'required',
			'description' => 'required'
		]);

		$subtema = Subtemas::findOrFail($subtema_id);

		

		$subtema->difficulty = $formFields['difficulty'];
		$subtema->title = $formFields['title'];
		$subtema->description = $formFields['description'];
		$subtema->status = $formFields['status'];

		$subtema->save();

		return redirect('/admin/temas/' . $id)->with('success', 'Subtema editado excitosamente');
		
	}

	public function temas_edit_subtema($id, $subtema_id) {
		$tema = Temas::findOrFail($id);
		$subtema = Subtemas::findOrFail($subtema_id);
	
		return view('admin.temas_edit_subtema', ['tema' => $tema, 'subtema' => $subtema]);
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

		return redirect('/admin/temas/' . $id)->with('success', 'Subtema añadido excitosamente');

	}

	public function subtema_view($tema_id, $subtema_id) {

		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);
		$questions = Questions::where('section_id', $subtema->id)->get();

		if($subtema->type == 'multiple_choice') {

			$q = [];

			foreach($questions as $question) {
				if($question->answer == 'question') {
					$q['question'] = $question->question;
					continue;
				}

				if($question->question == 'answer') {
					continue;
				}
				
				$q[$question->question] = [$question->answer];

			}

			foreach($questions as $question) {
				if($question->question == 'answer') {
					$test = 'answer-' . explode('_', $question->answer)[1];
					//dd($q[$test]);
					array_push($q[$test], 'correct');
				}
			}

			$questions = $q;
		}

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
					'answer_1' => 'required',
					'answer_2' => 'required',
					'answer_3' => 'required',
					'answer_4' => 'required',
					'answer' => 'required'
				]);

				$datas = [
					[$request->question, 'question'],
					['answer-1', $request->answer_1],
					['answer-2', $request->answer_2],
					['answer-3', $request->answer_3],
					['answer-4', $request->answer_4],
					['answer', $request->answer]
				];

				forEach($datas as $data) {
					Questions::create([
						'section_id' => $subtema->id,
						'question' => $data[0],
						'answer' => $data[1],
					]);
				}

				return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id);

				break;
		}

		$formFields['section_id'] = $subtema->id;
		Questions::create($formFields);

		$subtema->status = 'active';
		$subtema->save();

		return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)->with('success', 'Pregunta añadida excitosamente');

	}

	public function question_edit($tema_id, $subtema_id) {

		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);
		$questions = Questions::where('section_id', $subtema_id)->get();

		return view('admin.questions-edit', [
			'tema' => $tema,
			'subtema' => $subtema,
			'question' => $questions
		]);
		
	}

	public function question_update(Request $request, $tema_id, $subtema_id) {
		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);


		switch($subtema->type) {
			case "true_or_false":

				// Check if there's already a question
				$q = Questions::where('section_id', $subtema->id)->get()[0];

				/*
				if(count($q) > 0) {
					return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)
						->with('error', 'Los subtemas de tipo "verdadero y falso" solo pueden tener una pregunta y respuesta');
					
				}
				 */

				$formFields = $request->validate([
					'question' => 'required',
					'answer' => 'required',
				]);

				$q->question = $formFields['question'];
				$q->answer = $formFields['answer'];
				$q->save();

				break;

			case "flashcards":

				// Check if there's already a question
				$q = Questions::where('section_id', $subtema->id)->get()[0];

				/*
				if(count($q) > 0) {
					return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)
						->with('error', 'Los subtemas de tipo "flashcards" solo pueden tener una pregunta y respuesta');
				}
				 */

				$formFields = $request->validate([
					'answer' => 'required',
					'question' => 'required',
				]);

				$q->question = $formFields['question'];
				$q->answer = $formFields['answer'];
				$q->save();


				break;

			case "multiple_choice":

				$q = Questions::where('section_id', $subtema->id)->get();

				$formFields = $request->validate([
					'question' => 'required',
					'answer_1' => 'required',
					'answer_2' => 'required',
					'answer_3' => 'required',
					'answer_4' => 'required',
					'answer' => 'required'
				]);

				$datas = [
					[$request->question, 'question'],
					['answer-1', $request->answer_1],
					['answer-2', $request->answer_2],
					['answer-3', $request->answer_3],
					['answer-4', $request->answer_4],
					['answer', $request->answer]
				];

				forEach($q as $question) {

					if ($question->answer == 'question') {
						$question->question = $datas[0][0];	
					}

					if ($question->question == 'answer') {
						$question->answer = $datas[5][1];	
					}

					forEach($datas as $data) {

						if($question->question == $data[0]) {
							$question->answer = $data[1];
						}

					}


					$question->save();
				}


				break;
		}


		return redirect('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)->with('success', 'Pregunta guardata de de forma excitosamente');

	}

	public function question_delete(Request $request, $tema_id, $subtema_id) {
		$tema = Temas::findOrFail($tema_id);
		$subtema = Subtemas::findOrFail($subtema_id);
		$questions = Questions::where('section_id', $subtema_id)->get();

		forEach($questions as $question) {
			$question->delete();
		}

		$subtema->status = 'inactive';
		$subtema->save();

		return redirect('/admin/temas/'. $tema_id .'/subtema/' . $subtema_id)->with('success', 'Pregunta eliminada de de forma excitosamente');
	}
}
