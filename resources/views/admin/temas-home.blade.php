@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/temas-home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fuelux/css/tree-style.css') }}" />
@endsection

@section('body')

                  <div class="panel">
                      <div class="panel-heading">
                          Tree Style #1 All template
                          <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                            </span>
                      </div>
                      <div class="panel-body">
                          <div id="FlatTree" class="tree tree-plus-minus">
                              <div class = "tree-folder" style="display:block;">
                                  <div class="tree-folder-header">
                                      <i class="fa fa-folder"></i>
					
                                      <div class="tree-folder-name">asdasd</div>
                                  </div>
                                  <div class="tree-folder-content"></div>
                                  <div class="tree-loader" style=""></div>
                              </div>
                              <div class="tree-item" style="display: block;">
                                  <i class="tree-dot"></i>
                                  <div class="tree-item-name">testing</div>
                              </div>
                          </div>
                      </div>
                  </div>

<div class="panel">
	<div class="panel-heading">
		Tree Style #1
			<span class="tools pull-right">
			<a href="javascript:;" class="fa fa-chevron-down"></a>
			<a href="javascript:;" class="fa fa-times"></a>
		</span>
	</div>

<div class="panel-body" style="display: block;">

<div id="FlatTree" class="tree tree-plus-minus">
<div class="tree-folder" style="display:none;">
<div class="tree-folder-header">
<i class="fa fa-folder"></i>
<div class="tree-folder-name"></div>
</div>
<div class="tree-folder-content"></div>
<div class="tree-loader" style="display: none;"></div>
</div>
<div class="tree-item" style="display:none;">
<i class="tree-dot"></i>
<div class="tree-item-name"></div>
</div>
<div class="tree-folder" style="display: block;">
<div class="tree-folder-header">
<i class="fa fa-folder"></i>
<div class="tree-folder-name">Theme</div>
</div>
<div class="tree-folder-content"></div>
<div class="tree-loader" style="display: none;"><img src="img/input-spinner.gif"></div>
</div><div class="tree-folder" style="display: block;">
<div class="tree-folder-header">
<i class="fa fa-folder"></i>
<div class="tree-folder-name">Design</div>
</div>
<div class="tree-folder-content"></div>
<div class="tree-loader" style="display: none;"><img src="img/input-spinner.gif"></div>
</div><div class="tree-item" style="display: block;">
<i class="tree-dot"></i>
<div class="tree-item-name">Development</div>
</div><div class="tree-item" style="display: block;">
<i class="tree-dot"></i>
<div class="tree-item-name">Testing</div>
</div></div>
</div>

</div>



	<a href="{{url('/admin/temas-add')}}" class="btn btn-success">Crear otro Tema</a>

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
