

<div class="form-group @error('title') has-error @enderror">
	<label for="title">Titulo</label>
	<input value="{{$question[0]->question}}" type="text" name="question"  class="form-control" id="question" placeholder="Pregunta">

	@error('question')
		  <span class="help-block">La pregunta es requerida</span>
	@enderror
</div>

<div class="form-group @error('answer') has-error @enderror">
	<label for="answer">Respuesta</label>
	<select id="answer" name="answer" class="form-control">
		<option value="true">Verdadero</option>
		<option value="false">Falso</option>
	</select>
	@error('answer')
		{{$message}}
	@enderror
</div>
