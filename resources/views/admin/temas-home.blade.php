@extends('layout')

@section('body')

	<a href="{{url('/admin/temas-add')}}" class="btn btn-success">Crear otro Tema</a>

@foreach($temas as $tema)
	<div class="row">
		<div class="col-md-6">
			<div class="panel">
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
