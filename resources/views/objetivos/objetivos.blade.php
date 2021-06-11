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
	
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Descrição</th>
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
			</tr>
			@endforeach
		</tbody>
	</table>
@stop