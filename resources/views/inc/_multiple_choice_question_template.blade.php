<div class="form-group @error('question') has-error @enderror">
	<label for="title">Pista</label>
	<input type="text" name="question"  class="form-control" id="hint" placeholder="Escribe una pista para la respuesta">

	@error('question')
		  <span class="help-block">La pregunta es requerida requerida</span>
	@enderror
</div>
