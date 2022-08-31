@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/temas-home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fuelux/css/tree-style.css') }}" />
@endsection

@section('body')
	
			
	<header class="temas-header">
		<span></span>


		<h1>Temas</h1>
		

		<a href="{{url('/admin/temas-add')}}" class="btn btn-success">Añadir</a>
	</header>
	<hr>

@foreach($temas as $tema)
	<div class="row no-margin">
		<div class="col-12 no-margin">
			<div class="panel no-margin">
				<div class="panel-heading">
					{{$tema['title']}}

					<span class="tools pull-right">
<!--
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-times"></a>
-->
						<a href="{{url('admin/temas/' . $tema['id'])}}">
							<i class="fa fa-pencil"></i>
						</a>
					</span>
					<!--
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-times"></a>
					</span>
					-->
				</div>
			<div class="panel-body">
				@if(count($tema['subtemas']) != 0)
				<ul>

					@foreach($tema['subtemas'] as $subtema)
						<li>{{$subtema->title}}</li>
					@endforeach
				</ul>
				@else
					<p>Este tema no tiene subtemas</p>
					
				@endif
			</div>
		</div>

					<!--
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					Tema #2
					<span class="tools pull-right">
						<a href="javascript:;" class="fa fa-chevron-down"></a>
						<a href="javascript:;" class="fa fa-times"></a>
					</span>
				</div>
			<div class="panel-body">
				<ul>
					<li>Amet excepturi officiis</li>
					<li>Amet excepturi officiis</li>
					<li>Amet excepturi officiis</li>
					<li>Amet excepturi officiis</li>
					<li>Amet excepturi officiis</li>
					<li>Amet excepturi officiis</li>
				</ul>
			</div>
		</div>
					-->
	</div>
@endforeach
@endsection


@section('scripts')
<!--common script for all pages-->
<script src="{{ asset('/template_content/js/common-scripts.js')  }}"></script>
<script src="{{ asset('/template_content/js/tree.js') }} "></script>
    <script src="{{ asset('/template_content/assets/fuelux/js/tree.min.js') }}"></script>
<script>
      jQuery(document).ready(function() {
          TreeView.init();
      });
</script>
@endsection
