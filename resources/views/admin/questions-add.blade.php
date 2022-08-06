@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/questions_add.css') }}">
@endsection


@section('body')

	<div class="row no-margin">
		<div class="col-12 header-1">
			<a href="{{url('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
			<h2 style="text-align:center;"><strong>Añadir preguntas</strong></h2>
			<span></span>
		</div>
	</div>

	<div class="row no-margin">
		<div class="col-12">
			
			<section class="panel max-1000px ma">
				<header class="panel-heading">
					<strong> Añadir pregunta en {{$subtema->title}} </strong>
<!--
					<a class="btn btn-success" href="{{url('/admin/temas/' . $tema->id . '/add-subtema')}}">Agregar</a>
-->
				</header>

				<form method="POST" action="">
					@csrf

					@if($subtema->type == 'true_or_false')

						<div class="form-group @error('title') has-error @enderror">
							<label for="title">Titulo</label>
							<input type="text" name="question"  class="form-control" id="question" placeholder="Pregunta">

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
					@endif

					<button type="submit" class="btn btn-info">Crear</button>
				</form>
			</section>

		</div>
	</div>

@endsection
