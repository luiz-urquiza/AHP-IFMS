@extends ('layouts.index')

@section ('menu')
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
		</li>
	</ul>
@stop

@section ('conteudo')
	<h3>Critérios do Objetivo {{ $objetivo["id"] }} - {{ $objetivo["descricao"] }}</h3>
	<div>
		<a class="btn btn-primary" href="/formCreateCriterio/{{ $objetivo['id'] }}">Novo Critério</a>
	</div><hr>
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>ID</th>
				<th>descricao</th>
			</tr>
		</thead>
		<tbody>
			@foreach($criterios as $criterio)
			<tr>
				<td>{{ $criterio->id }}</td>
				<td>{{ $criterio->descricao }}</td>
			</tr>
			@endforeach
		</tbody>
	</table><hr>
	<div>
		<a class="btn btn-primary" href="/formCreateCriterio/{{ $objetivo['id'] }}">Novo Critério</a>
	</div>
<!--
<table class="table">
  <thead class="thead-light">
    <tr>
    <th>Critérios</th>
    @foreach($criterios as $criterio)
			
				<th scope="col">{{ $criterio["nome"] }}</th>
		
			@endforeach
         </tr>
  </thead>
  <tbody>
  @foreach($criterios as $criterio)
  <tr> 
      <th scope="row">{{$criterio["nome"]}}</th>
      @foreach($criterios as $criterio2)
      @if($criterio["id"] == $criterio2["id"])
      <td>1,000</td>
      @elseif($criterio["id"] < $criterio2["id"])
      <td id="c{{$criterio['id']}}_{{$criterio2['id']}}">
        <select class="custom-select">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
        </select>
      </td>
      @else
      <td id="c{{$criterio['id']}}_{{$criterio2['id']}}"></td>
      @endif
      @endforeach
  </tr>
    @endforeach
  </tbody>
</table>
-->

@stop