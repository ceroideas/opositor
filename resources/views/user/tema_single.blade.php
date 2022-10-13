@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/tema_single.css') }}">
@endsection

@section('body')


	<div class="row no-margin">
		<div class="col-12 no-margin super_test header-1">
			<a href="{{url('/dashboard/mis-temas')}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
			<h2 class="text-center margin-tb">  Temas </h2>
		
			<span></span>
		</div>
	</div>

	<section class="panel descripcion-panel">
		<header class="panel-heading">
			<h3>Descripcion</h3>
		</header>

		<p> Amet placeat facilis doloremque impedit quas. Quibusdam modi eveniet odio accusamus suscipit. Ex assumenda quidem voluptates veritatis id porro. Ducimus veritatis nobis nihil facilis ipsum Obcaecati aliquid harum fuga placeat. </p>

{{--

		<p class="descripcion"> {{ $subtema->description }} </p>
--}}
	</section>

                      <!--collapse start-->
                      <div class="panel-group m-bot20" id="accordion">

			@for ($i = 0; $i <= 10; $i++)
		
                          <div class="panel panel-default">

                              <div class="panel-heading">
                                  <h4 class="panel-title">
				      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                                          Collapsible Group Item {{ $i }}
                                      </a>
                                  </h4>
                              </div>

                              <div id="collapse{{$i}}" class="panel-collapse collapse ">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>

                          </div>

			@endfor

                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                          Collapsible Group Item #2
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                          Collapsible Group Item #3
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--collapse end-->

{{--
	<div class="row no-margin">
		<div class="col-sm-12">
			<section class="panel">
				<div class="panel-body">
					@if(count($temas) >= 0)

						<div class="adv-table">
							<table  class="display table  table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									@for ($i = 0; $i <= 100; $i++)
										<tr>
											<td> <a href="#">Tittle {{$i}}</a> </td>
											<td>Lorem vitae exercitationem explicabo facilis praesentium eum? Porro enim ullam {{$i}}</td>
											
											<td>
												<button class="btn btn-success btn-xs"><i title="Añadir" class="fa fa-plus"></i></button>
<!--
												<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
												<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
-->
											</td>
										</tr>
									@endfor


								</tbody>
							</table>
						</div>

					@else
						<div class="center">
							<h2 class="text-center">No hay temas disponibles</h2>
						</div>
					@endif
				</div>
			</section>
		</div>
	</div>
--}}
@endsection

@section('scripts')
<script>
    // aqui los scripts de la pagina
</script>
<script src="{{ asset('/template_content/js/dynamic_table_init.js') }}"></script>
@stop
