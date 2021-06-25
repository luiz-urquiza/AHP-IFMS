@extends ('layouts.index')

@section ('menu')
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
		</li>
	</ul>
@stop

@section ('conteudo')
	<h3>Critérios do Objetivo {{ $objetivo["id"] }} - {{ $objetivo["nome"] }}</h3>
<!--
	<table class="table">
		<theader>
			<tr>
				<th>ID</th>
				<th>Nome</th>
			</tr>
		</theader>
		<tbody>
			@foreach($criterios as $criterio)
			<tr>
				<td>{{ $criterio["id"] }}</td>
				<td>{{ $criterio["nome"] }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
-->
@stop