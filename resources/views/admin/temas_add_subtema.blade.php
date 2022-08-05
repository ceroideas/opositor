@extends('layout')

@section('css')

@endsection
    <link rel="stylesheet" href="{{ asset('/css/add_subtema.css') }}">
@section('body')

<div class="row no-margin">
	<div class="col header-1">
		<a href="{{url('/admin/temas-show')}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
		<h2 class="title">Añadir otro subtema</h2>
		<span></span>
	</div>
</div>

<div class="row no-margin">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Crear otro subtema en {{$tema->title}}
			</header>

			<div class="panel-body">
				<form method="POST" role="form">
					@csrf

					<div class="form-group @error('title') has-error @enderror">
						<label for="title">Titulo</label>
						<input type="text" name="title"  class="form-control" id="title" placeholder="Titulo del Subtema">

						@error('title')
							  <span class="help-block">Un title es requerido</span>
						@enderror
					</div>

					<div class="form-group @error('type') has-error @enderror">
						<label for="type">Tipo</label>
						<select id="type" name="type" class="form-control">
							<option value="true_or_false">Verdadero o falso</option>
							<option value="multiple_choice">Selecion multiple</option>
							<option value="flashcards">flashcards</option>
						</select>
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
							<textarea class="form-control ckeditor" name="description" rows="6"></textarea>
						</div>

						@error('description')
							  <span class="help-block">Una descripcion es requerido</span>
						@enderror
					</div>

					<button type="submit" class="btn btn-info">Crear</button>
				</form>
			</div>
		</section>
	</div>
</div>
@endsection
