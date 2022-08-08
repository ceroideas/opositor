
<div class="form-group @error('title') has-error @enderror">
	<label for="title">Titulo</label>
	<input type="text" name="question"  class="form-control" id="question" placeholder="Pregunta">

	@error('question')
		  <span class="help-block">La pregunta es requerida</span>
	@enderror
</div>

<div class="form-group @error('title') has-error @enderror">
	<label for="title">Pista</label>
	<input type="text" name="hint"  class="form-control" id="hint" placeholder="Escribe una pista para la respuesta">

	@error('hint')
		  <span class="help-block">La pista es requerida</span>
	@enderror
</div>
