
@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/mis_temas.css') }}">
@endsection

@section('body')


	<div class="row no-margin">
		<div class="col-12 no-margin super_test header-1">
			<a href="{{url('/dashboard')}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
			<h2 class="text-center margin-tb"> Mis Temas </h2>
		
			<span></span>
		</div>
	</div>


	<div class="row no-margin">
		<div class="col-sm-12">
			<section class="panel">
				<div class="panel-body">
					@if(count($mis_temas) >= 0)

						<div class="adv-table">
							<table  class="display table {{-- table-bordered table-striped --}}" id="dynamic-table">
								<thead>
									<tr>
										<th>Titulo</th>
										<th>Descripcion</th>
									</tr>
								</thead>
								<tbody>

									@for ($i = 0; $i <= 100; $i++)
										<tr>
											<td>Tittle {{$i}}</td>
											<td>Lorem vitae exercitationem explicabo facilis praesentium eum? Porro enim ullam {{$i}}</td>
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
@endsection

@section('scripts')
<script>
    // aqui los scripts de la pagina
</script>
<script src="{{ asset('/template_content/js/dynamic_table_init.js') }}"></script>
@stop
