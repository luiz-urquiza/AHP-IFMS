@extends('layouts.index')

@section('menu')

    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
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
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).</p>
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
  <p>Tip: You can also remove the .navbar-expand-md class to ALWAYS hide navbar links and display the toggler button.</p>
@stop