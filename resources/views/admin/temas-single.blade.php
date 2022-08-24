
@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/temas_view.css') }}">
@endsection

@section('body')
	<div class="row no-margin">
		<div class="col-12 header-1">
			<a href="{{url('/admin/temas-show')}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
			<h2 style="text-align:center;"><strong>{{$tema->title}}</strong></h2>
			<span></span>
		</div>
	</div>


              <div class="row no-margin">
                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
				<strong> Sub Temas </strong>
				<a class="btn btn-success" href="{{url('/admin/temas/' . $tema->id . '/add-subtema')}}">Agregar</a>
                          </header>

			@if(count($subtemas) > 0)
				  <table class="table table-striped table-advance table-hover">
				      <thead>
				      <tr>
					  <th><i class="fa fa-bullhorn"></i>Nombre</th>
					  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descripcion</th>
					  <th><i class="fa fa-bookmark"></i> Status</th>
					  <th><i class="fa fa-bookmark"></i> Tipo</th>
					  <th><i class=" fa fa-edit"></i> Dificultad</th>
					  <th></th>
				      </tr>
				      </thead>
				      <tbody>
						@foreach($subtemas as $subtema)
						      <tr>
							  <td> <a href="{{url('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id)}}">{{$subtema->title}}</a></td>

							@php
								$description = strlen($subtema->description) > 13 ? substr($subtema->description, 0, 30) . '...' : $subtema->description;
							@endphp
							  <td class="hidden-phone">{{$description}}</td>

							@if($subtema->status == 'active')
							  <td class="dificulty-column"><span class="label label-success label-mini">Activa</span></td>
							@else
							  <td class="dificulty-column"><span class="label label-danger label-mini">Inactiva</span></td>
							@endif

							@switch($subtema->type)
								@case('true_or_false')
									  <td>Verdadero o falso</td>
									@break

								@case('multiple_choice')
									  <td>Seleccion Multiple</td>
									@break

								@case('flashcards')
									  <td>Flashcards</td>
									@break
							@endswitch
							
							@switch($subtema->difficulty)
								@case('easy')
								  <td class="dificulty-column"><span class="label label-success label-mini">Facil</span></td>
									@break

								@case('medium')
								  <td class="dificulty-column"><span class="label label-info label-mini">Medio</span></td>
									@break

								@case('hard')
								  <td class="dificulty-column"><span class="label label-danger label-mini">Dificil</span></td>
									@break
							@endswitch

							  <td>
								<!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
								
							      <a href="{{ url('/admin/temas/' . $tema->id . '/edit-subtema/' . $subtema->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
							      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
							  </td>
						      </tr>
						@endforeach
				      </tbody>
				  </table>
			@else
				<h2 class="no-subtema">No hay subtemas</h2>
			@endif	

                      </section>


                  </div>
              </div>
@endsection
