@extends ('layouts.index')


@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/nodes">Nodes</a>
		</li>
    </ul>
@stop


@section ('conteudo')
<!--
<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
  </div>

  <div class="jumbotron jumbotron-fluid">
  
</div>
--> 
<div class="container">
    <p class="lead">Objective: {{ $results->getObjective() }} </p>
  </div>

<!--
    <h5 class="card-title">Criterios</h5>

   @foreach($results->getCriteria() as $q)

	<div class="card-body">
    
    <p class="card-text">{{$q['descr']}}</p>
    </div>

    @endforeach

    <h5 class="card-title">Alternativas</h5>

    @foreach($results->getAlternatives() as $a)

 <div class="card-body">
 
 <p class="card-text">{{$a['descr']}}</p>
 </div>

 @endforeach

 <h5 class="card-title">Score</h5>

@foreach($results->getScore() as $s)

<div class="card-body">

<p class="card-text">{{ $s }}</p>
</div>

@endforeach

@for ($i = 0; $i < count($results->getAlternatives()) ; $i++)
    {{ $results->getAlternatives()[$i]->descr }}: {{ $results->getScore()[$i] }} <br>
@endfor
-->
	<div class="card text-center">
		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="chart-wrapper">
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
		</div> 
	</div>
<hr>
	Santos é freguês do Palmeiras
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="chart-wrapper">
				<canvas id="myChart2"></canvas>
			</div>
		</div>
	</div>
</div>


	<script>

		//Data das Alternativas
			const data = {
				labels: [
					@foreach($results->getAlternatives() as $a)
					'{{$a['descr']}}',
					@endforeach
					],
				datasets: [{
					label: '% of priority of alternatives for the objective: {{$results->getObjective()}}',
					data: [
						@foreach($results->getScore() as $s)
						'{{$s*100}}',
						@endforeach
					],
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
			};
			
			//Configurações Gráfico 1
			const config = {
				type: 'bar',
				data,
				options: {
					scales: {
						y:{
							beginAtZero: true
						}
					}
				}
			};

			//Configurações Gráfico 2
			const config2 = {
				type: 'line',
				data,
				options: {
					scales: {
						y:{
							beginAtZero: true
						}
					}
				}
			};
			
			//Renderiza o Gráfico 1
			const MyChart = new Chart( 
			document.getElementById('myChart'),
			config
			);
			
			////Renderiza o Gráfico 1
			const MyChart2 = new Chart( 
			document.getElementById('myChart2'),
			config2
			);
		
</script>



@stop