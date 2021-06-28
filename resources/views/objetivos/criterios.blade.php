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

<table class="table">
  <thead class="thead-light">
    <tr>
    <th>Critérios</th>
      <th scope="col">Custo</th>
      <th scope="col">Cilindrada</th>
      <th scope="col">Esportividade</th>
    </tr>
  </thead>
  <tbody>
     <tr> 
      <th scope="row">Custo</th>
      <td>1,000</td>
      <td>1,710</td>
      <td>1,442</td>
    </tr>
    <tr>
      <th scope="row">Cilindrada</th>
      <td>0,585</td>
      <td>1,000</td>
      <td>0,693</td>
    </tr>
    <tr>
      <th scope="row">Esportividade</th>
      <td>0,693</td>
      <td>1,442</td>
      <td>1,000</td>

    </tr>
  </tbody>
</table>


@stop