@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/edit_subtema.css') }}">
@endsection

@section('body')

<div class="row no-margin">
	<div class="col header-1">
		<a href="{{url('/admin/temas/' . $tema->id)}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
		<h2 class="title">Editar {{$subtema->title}}</h2>
		<span></span>
	</div>
</div>

<div class="row no-margin">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Editar tema en {{$tema->title}}
			</header>

			<div class="panel-body">
				<form method="POST" role="form">
					@csrf

					<div class="form-group @error('title') has-error @enderror">
						<label for="title">Titulo</label>
						<input type="text" name="title" value="{{$subtema->title}}"  class="form-control" id="title" placeholder="Titulo del Subtema">

						@error('title')
							  <span class="help-block">Un title es requerido</span>
						@enderror
					</div>


					<div class="form-group static-type">
						<label class="col-lg-2 col-sm-2 control-label">Tipo</label>
						<div class="col-lg-10">
							@if($subtema->type == 'true_or_false')
								<p class="form-control-static">Verdadero o falso</p>
							@elseif ($subtema->type == 'flascards')
								<p class="form-control-static">Flashcards</p>
							@else
								<p class="form-control-static">Seleccion multiple</p>
							@endif
						</div>
					</div>

					<div class="form-group @error('status') has-error @enderror">
						<label for="difficulty">Status</label>
						<select id="difficulty" name="status" class="form-control">
							<option value="active">Activo</option>
							<option value="inactive">Inactivo</option>
						</select>

						@error('status')
							  <span class="help-block">Un estatus es requerido</span>
						@enderror
					</div>

					<div class="form-group @error('difficulty') has-error @enderror">
						<label for="difficulty">Dificultad</label>
						<select id="difficulty" name="difficulty" class="form-control">
							<option value="easy">Facil</option>
							<option value="medium">Medio</option>
							<option value="hard">dificil</option>
						</select>

						@error('difficulty')
							  <span class="help-block">Una descripcion es requerido</span>
						@enderror
					</div>

					<div class="form-group @error('description') has-error @enderror">
						<label class="col-sm-2 control-label col-sm-2">Descripcion</label>
						<div class="col-sm-10">
							<textarea class="form-control ckeditor" name="description" rows="6">
								{{$subtema->description}}
							</textarea>
						</div>

						@error('description')
							  <span class="help-block">Una descripcion es requerido</span>
						@enderror
					</div>

					<button type="submit" class="btn btn-info">Guardar</button>
				</form>
			</div>
		</section>
	</div>
</div>
@endsection
