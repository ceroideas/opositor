@foreach($questions as $key => $value)

	@if($key == 'question')
		
		<table class="table">
			<thead>
				<tr>
					<th>Pregunta</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>{{$value}}</td>
				</tr>
			</tbody>
		</table>
	@endif

@endforeach

<table class="table">
	<thead>
		<tr>
			<th>Respuesta</th>
		</tr>
	</thead>

	<tbody>
			@foreach($questions as $key => $value)

				@if($key != 'question')
						@if(count($value) > 1)
							<tr class="correct-answer">
								<td>{{$value[0]}}</td>			
							</tr>
						@else
							<tr>
								<td>{{$value[0]}}</td>			
							</tr>
						@endif

				@endif

			@endforeach
	</tbody>
</table>
