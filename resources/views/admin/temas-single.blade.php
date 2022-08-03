
@extends('layout')

@section('body')
	<div class="row">
		<div class="col-12">
			<h2 style="text-align:center;">{{$tema->title}}</h2>
		</div>
	</div>


              <div class="row">
                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading">
				Sub Temas
				<button type="button" class="btn btn-success">Success</button>
                          </header>

			@if(count($subtemas) > 0)
				  <table class="table table-striped table-advance table-hover">
				      <thead>
				      <tr>
					  <th><i class="fa fa-bullhorn"></i>Nombre</th>
					  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
					  <th><i class="fa fa-bookmark"></i> Tipo</th>
					  <th><i class=" fa fa-edit"></i> Dificultad</th>
					  <th></th>
				      </tr>
				      </thead>
				      <tbody>
						@foreach($subtemas as $subtema)
						      <tr>
							  <td><a href="#">{{$subtema->title}}</a></td>

							@php
								$description = strlen($subtema->description) > 13 ? substr($subtema->description, 0, 30) . '...' : $subtema->description;
							@endphp
							  <td class="hidden-phone">{{$description}}</td>

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
								  <td><span class="label label-success label-mini">Facil</span></td>
									@break

								@case('medium')
								  <td><span class="label label-info label-mini">Medio</span></td>
									@break

								@case('hard')
								  <td><span class="label label-danger label-mini">Dificil</span></td>
									@break
							@endswitch

							  <td>
								<!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
							      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
							      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
							  </td>
						      </tr>
						@endforeach
				      </tbody>
				  </table>
			@else
				<h2>No hay subtemas</h2>
			@endif	

                      </section>


                  </div>
              </div>
@endsection
