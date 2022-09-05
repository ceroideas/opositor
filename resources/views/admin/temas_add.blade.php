@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/temas_add.css') }}">
@endsection

@section('body')
	<style>

	</style>

<div class="row no-margin">
	<div class="col header-1">
		<a href="{{url('/admin/temas-show')}}" class="goback-link"><i class="fa fa-angle-left"></i></a>
		<h2 class="title">Editar </h2>
		<span></span>
	</div>
</div>

	<div class="row main-row no-margin">
		<div id="" class="mx-a col-md-10 no-margin main-col">
                      <section class="panel">
                          <header class="panel-heading">
                              Añadir un tema
                          </header>
                          <div class="panel-body">
                              <form action="temas-store" method="POST" role="form">
				@csrf
                                  <div class="form-group">
                                      <label for="tema_title">Nombre del tema</label>
                                      <input type="text" name="title" class="form-control" id="tema_title" placeholder="Este es el nombre de el tema">
                                  </div>
				@error('title')
					<p>{{$message}}</p>
				@enderror
<!--
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputFile">File input</label>
                                      <input type="file" id="exampleInputFile">
                                      <p class="help-block">Example block-level help text here.</p>
                                  </div>
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox"> Check me out
                                      </label>
                                  </div>
-->
<!--
				<div class="form-group">
					<label class="col-sm-2 control-label col-sm-2">Descripcion</label>
					<div class="col-sm-10">
						<textarea placeholder="Descripcion de el tema" class="form-control ckeditor" name="editor1" rows="6"></textarea>
					</div>
				</div>
-->
                                  <button type="submit" class="btn btn-info">Submit</button>
                              </form>

                          </div>
                      </section>
		</div>
	</div>
	

@endsection

@section('scripts')
@endsection


