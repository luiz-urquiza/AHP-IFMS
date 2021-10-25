@extends ('layouts.index')

@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
		</li>
<!-- Dropdown -->
<!--
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Dropdown link
		  </a>
		  <div class="dropdown-menu">
			<a class="dropdown-item" href="#">Link 1</a>
			<a class="dropdown-item" href="#">Link 2</a>
			<a class="dropdown-item" href="#">Link 3</a>
		  </div>
		</li>
-->
    </ul>

@stop

@section ('conteudo')
	<h1>Objetivos</h1>
	<div>
		<a class="btn btn-primary" href="/formCreateObjetivo">Novo Objetivo</a>
	</div><hr>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Operações</th>
				<th>Critérios</th>
				<th>Operações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($objetivos as $objetivo)
			<tr>
				<td>{{ $objetivo['id'] }}</td>
				<td>{{ $objetivo['nome'] }}</td>
				<td>
				{{ $objetivo['descricao'] }}
				</td>
				<td>
					<a href="/objetivo/{{ $objetivo['id'] }}/criterios">Critérios</a>
					<a href="/objetivo/{{ $objetivo['id'] }}/alternativas">Alternativas</a>
				</td>

				<td>{{$objetivo->criterios()->count()}}</td>
				<td>
				<a class="btn btn-warning" href="/objetivo/{{$objetivo->id}}/alterar">Alterar</a>
				<a class="btn btn-warning" href="/objetivo/{{$objetivo->id}}/excluir">Excluir</a>
				<!-- Modal aqui -->
				</td>
			</tr>
			@endforeach

	
		</tbody>
	</table>
	<div><hr>
		<a class="btn btn-primary" href="/formCreateObjetivo">Novo Objetivo</a>
	</div><hr>

<div class="alert alert-info">

	<div class="container">
		<div class="row">
		
			<div class="col-sm-4">
				<h3> Objetivo</h3>
				<p> Objetivo a ser alcançado, onde quer chegar ou qual o melhor caminho. </p>
			</div>
				
		
			<div class="col-sm-4">
				<h3>Critérios</h3>
				<p>Um critério pode ser uma forma ou uma condição.</p>
			</div>
		
			
			<div class="col-sm-4">
				<h3>Alternativas</h3>
				<p>Alternativa São as opções que podem ajudar a chegar a uma conclusão.</p>
			</div>
			
		</div>
	</div>
</div>
@stop