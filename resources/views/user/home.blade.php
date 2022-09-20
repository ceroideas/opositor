@extends('layout')

@section('body')

	<h1>Bienvenido {{ auth::user()->name }}</h1>


<!--
	<div style="z-index: 1;" class="row">
		<div class="col-lg-2" style="margin: 10px 20px;">
			<a href="" class="btn btn-block btn-success">Simple test</a>
		</div>
	</div>
-->

@endsection

@section('scripts')
<script>
    // aqui los scripts de la pagina
</script>
@stop
