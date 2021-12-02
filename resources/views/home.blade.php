@extends('layouts.index')

@section('menu')

    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/nodes">Nodes</a>
		</li>
<!-- Dropdown -->
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
    </ul>
@stop

@section('conteudo')
  <h3>AHP - Tomada de Decisões</h3>
  <p>AHP (Analytic Hierarchy Process)</p>
  <p> Um dos métodos multicritério mais utilizados, Criado pelo Professor Thomas L. Saaty em 1980;</p>
  <p> Permite o uso de critérios qualitativos bem como quantitativos no processo de avaliação. </p> 
  <p>A ideia principal é dividir o problema de decisão em níveis hierárquicos, facilitando, assim, sua compreensão e avaliação.</p>
@stop