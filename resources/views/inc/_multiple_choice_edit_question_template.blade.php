
@foreach($question as $field)

	@if($field->answer == 'question')

		<div class="form-group @error('question') has-error @enderror">
			<label for="title">Pregunta</label>
			<input value="{{$question[0]->question}}" type="text" name="question"  class="form-control" id="question" placeholder="Pregunta">

			@error('question')
				  <span class="help-block">La pregunta es requerida</span>
			@enderror
		</div>

	@elseif($field->question == 'answer')
		@continue
	@else

		@php
			$answer_number = explode('-', $field->question);
			$answer_number = array_pop($answer_number);

			$input_name = str_replace('-', '_', $field->question);
		@endphp
		
		<div class="form-group @error($field->question) has-error @enderror">
			<label for="{{$field->question}}">Respuesta #{{$answer_number}} </label>
			<input value="{{$field->answer}}" type="text" name="{{$input_name}}"  class="form-control" id="{{$field->question}}" placeholder="Respuesta">

			@error($field->question)
				  <span class="help-block">Esta respuesta es requerida</span>
			@enderror
		</div>

	@endif

@endforeach

<div class="form-group @error('answer') has-error @enderror">
	<label for="answer">Respuesta correcta</label>
	<select id="answer" name="answer" class="form-control">
		<option value="answer_1">Opcion #1</option>
		<option value="answer_2">Opcion #2</option>
		<option value="answer_3">Opcion #3</option>
		<option value="answer_4">Opcion #4</option>
	</select>
	@error('answer')
		{{$message}}
	@enderror
</div>

<!--
<div class="form-group @error('question') has-error @enderror">
	<label for="title">Pregunta</label>
	<input value="{{$question[0]->question}}" type="text" name="question"  class="form-control" id="question" placeholder="Pregunta">

	@error('question')
		  <span class="help-block">La pregunta es requerida</span>
	@enderror
</div>

<div class="form-group @error('answer-1') has-error @enderror">
	<label for="answer-1">Respuesta #1</label>
	<input value="{{$question[0]->answer_1}}" type="text" name="answer_1"  class="form-control" id="answer-1" placeholder="Respuesta">

	@error('answer-1')
		  <span class="help-block">La primera respuesta es requerida</span>
	@enderror
</div>

<div class="form-group @error('answer-2') has-error @enderror">
	<label for="answer-2">Respuesta #2</label>
	<input value="{{$question[0]->answer_2}}" type="text" name="answer_2"  class="form-control" id="answer-2" placeholder="Respuesta">

	@error('answer-2')
		  <span class="help-block">La Segunda respuesta es requerida</span>
	@enderror
</div>

<div class="form-group @error('answer-3') has-error @enderror">
	<label for="answer-3">Respuesta #3</label>
	<input value="{{$question[0]->answer_3}}" type="text" name="answer_3"  class="form-control" id="answer-3" placeholder="Respuesta">

	@error('answer-3')
		  <span class="help-block">La Tercera respuesta es requerida</span>
	@enderror
</div>

<div class="form-group @error('answer-4') has-error @enderror">
	<label for="answer-4">Respuesta #4</label>
	<input type="text" value="{{$question[0]->answer_4}}" name="answer_4"  class="form-control" id="answer-4" placeholder="Respuesta">

	@error('answer-4')
		  <span class="help-block">La primera respuesta es requerida</span>
	@enderror
</div>


<div class="form-group @error('answer') has-error @enderror">
	<label for="answer">Respuesta correcta</label>
	<select id="answer" name="answer" class="form-control">
		<option value="answer_1">Opcion #1</option>
		<option value="answer_2">Opcion #2</option>
		<option value="answer_3">Opcion #3</option>
		<option value="answer_4">Opcion #4</option>
	</select>
	@error('answer')
		{{$message}}
	@enderror
</div>
-->
