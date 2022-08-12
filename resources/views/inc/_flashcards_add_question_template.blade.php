
<div class="form-group @error('hint') has-error @enderror">
	<label for="title">Pista</label>
	<input type="text" name="question"  class="form-control" id="hint" placeholder="Escribe una pista para la respuesta">

	@error('hint')
		  <span class="help-block">La pista es requerida</span>
	@enderror
</div>


<div class="form-group @error('answer') has-error @enderror">
	<label for="title">Respuesta</label>
	<input type="text" name="answer"  class="form-control" id="answer" placeholder="Respuesta">

	@error('answer')
		  <span class="help-block">La respuesta es requerida</span>
	@enderror
</div>
