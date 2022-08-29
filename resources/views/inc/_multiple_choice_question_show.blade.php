
@foreach($questions as $question)

	@if($question->answer == 'question')
		
		<table class="table">
			<thead>
				<tr>
					<th>Pregunta</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>{{$question->question}}</td>
				</tr>
			</tbody>
		</table>
	@endif

@endforeach


@foreach($questions as $question)

	@if($question->answer == 'question')
		@continue
	@endif
		
	<table class="table">
		<thead>
			<tr>
				<th>Respuesta</th>
				<th>Opcion</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{{$question->answer}}</td>
			</tr>
		</tbody>
	</table>

@endforeach
