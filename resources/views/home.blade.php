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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="chart-wrapper">
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
</div>


<script>
	const ctx = document.getElementById('myChart');
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
			datasets: [{
				label: '# of Votes',
				data: [1, 19, 3, 5, 2, 3],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

@stop