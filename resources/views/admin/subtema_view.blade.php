@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/subtema_view.css') }}">
@endsection

@section('body')

	<div class="row no-margin">
		<div class="col-12 no-margin super_test header-1">
			<a href="{{url('/admin/temas/' . $tema->id)}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
			<h2 class="text-center margin-tb"> {{$subtema->title}} </h2>
		
			<span></span>
		</div>
	</div>

	<div class="row no-margin">
		<div class="col-12">
			<section class="panel">
				
				<table class="table table-striped table-advance table-hover">
					<thead>
						<tr>
							<th class="text-center"><i class="fa fa-bookmark"></i> Status</th>
							<th class="text-center"><i class="fa fa-bookmark"></i> Tipo</th>
							<th class="text-center"><i class=" fa fa-edit"></i> Dificultad</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!-- Status -->
							@if($subtema->status == 'active')
							  <td class="dificulty-column text-center"><span class="label label-success label-mini">Activa</span></td>
							@else
							  <td class="dificulty-column text-center"><span class="label label-danger label-mini">Inactiva</span></td>
							@endif

							<!-- Tipo -->
							@switch($subtema->type)
								@case('true_or_false')
									  <td class="text-center">Verdadero o falso</td>
									@break

								@case('multiple_choice')
									  <td class="text-center">Seleccion Multiple</td>
									@break

								@case('flashcards')
									  <td class="text-center">Flashcards</td>
									@break
							@endswitch



							<!-- Dificultad -->
							@switch($subtema->difficulty)
								@case('easy')
								  <td class="dificulty-column text-center"><span class="label label-success label-mini">Facil</span></td>
									@break

								@case('medium')
								  <td class="dificulty-column text-center"><span class="label label-info label-mini">Medio</span></td>
									@break

								@case('hard')
								  <td class="dificulty-column text-center"><span class="label label-danger label-mini">Dificil</span></td>
									@break
							@endswitch
						</tr>
					</tbody>
				</table>
			</section>

			<section class="panel descripcion-panel">
				<header class="panel-heading">
					<h3>Descripcion</h3>
				</header>

<!--

				<p class="descripcion"> {!! $subtema->description !!} </p>
-->
				<p class="descripcion"> {{ $subtema->description }} </p>
			</section>

			<section class="panel">
				<header class="panel-heading">
					<h3>Preguntas</h3>


					<div class="question-buttons">

						@if(count($questions) == 0)

							<a class="btn btn-success" href="{{url('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id . '/add-question')}}">Agregar</a>
						@else

							@php $url = '/admin/temas/'. $tema->id .'/subtema/' . $subtema->id . '/edit-question' @endphp

							<a class="btn btn-primary btn-xs" href="{{url($url)}}">Editar <i class="fa fa-pencil"></i></a>

							<a class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal">
								Eliminar
								<i class="fa fa-trash-o "></i>
							</a>

						@endif
					</div>
				</header>

				<div class="preguntas">
					@if(session()->has('error'))
						
						<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<p>{{session('error')}}</p>
						</div>
					@endif

					@if( count($questions) > 0)

					@if($subtema->type == 'multiple_choice')
						@include('../inc/_multiple_choice_question_show', ['questions' => $questions])
					@else
						<table class="table">
							<thead>
								<tr>
									<th>Pregunta</th>
									<th>Respuesta</th>
									<th></th> 
								</tr>
							</thead>

							<tbody>
								@foreach($questions as $question)
									<tr>
									@include('../inc/_question_row_show', ['question' => $question])

{{--
										<td>{{$question->question}}</td>

										@if($question->answer == 'true')
											<td>Verdadero</td>
										@elseif($question->answer == 'false')
											<td>Falso</td>
										@else
											<td>{{$question->answer}}</td>
										@endif
										<td>
										<!--	<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> -->

											@php $url = '/admin/temas/'. $tema->id .'/subtema/' . $subtema->id . '/edit-question' @endphp
											<a class="btn btn-primary btn-xs" href="{{url($url)}}"><i class="fa fa-pencil"></i></a>

											<a class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal">
												<i class="fa fa-trash-o "></i>
											</a>


											<!-- <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> -->

											      <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												      <div class="modal-content">
													  <div class="modal-header">
													      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													      <h4 class="modal-title">¿Seguro que deseas eliminar este subtema?</h4>
													  </div>
													  <div class="modal-body">

													      ¿Seguro que deseas eliminar este subtema?

													  </div>
													  <div class="modal-footer">

													      <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
													      <form action="{{url('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id . '/delete-question')}}" method="POST" class="form-inline" role="form">
															@csrf  <button type="submit" class="btn btn-danger">Eliminar</button>
													      </form>

													  </div>
												      </div>
												  </div>
											      </div>
										</td>
--}}
									</tr>
								@endforeach
							</tbody>
						</table>
						@endif
					@else
						<p>No hay preguntas por los momentos</p>
					@endif
				</div>

			</section>
			

		</div>
	</div>

@endsection
