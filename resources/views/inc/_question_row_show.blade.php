
<td>{{$question->question}}</td>

@if($question->answer == 'true')
	<td>Verdadero</td>
@elseif($question->answer == 'false')
	<td>Falso</td>
@else
	<td>{{$question->answer}}</td>
@endif
<td>
<!--	<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> -->

{{--
	@php $url = '/admin/temas/'. $tema->id .'/subtema/' . $subtema->id . '/edit-question' @endphp
	<a class="btn btn-primary btn-xs" href="{{url($url)}}"><i class="fa fa-pencil"></i></a>

	<a class="btn btn-danger btn-xs" data-toggle="modal" href="#myModal">
		<i class="fa fa-trash-o "></i>
	</a>
--}}


	<!-- <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> -->

	      <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		      <div class="modal-content">
			  <div class="modal-header">
			      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			      <h4 class="modal-title">¿Seguro que deseas eliminar este subtema?</h4>
			  </div>
			  <div class="modal-body">

			      ¿Seguro que deseas eliminar esta pregunta?

			  </div>
			  <div class="modal-footer">

			      <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
			      <form action="{{url('/admin/temas/' . $tema->id . '/subtema/' . $subtema->id . '/delete-question')}}" method="POST" class="form-inline" role="form">
					@csrf  <button type="submit" class="btn btn-danger">Eliminar</button>
			      </form>

			  </div>
		      </div>
		  </div>
	      </div>
</td>
