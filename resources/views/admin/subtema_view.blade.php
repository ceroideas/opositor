@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/subtema_view.css') }}">
@endsection

@section('body')

	<div class="row no-margin">
		<div class="col-12 no-margin">
			<h2 class="text-center margin-tb"> {{$subtema->title}} </h2>
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
				</header>

				<div class="preguntas">
					<p>No hay preguntas por los momentos</p>
				</div>

			</section>
			

		</div>
	</div>

@endsection
