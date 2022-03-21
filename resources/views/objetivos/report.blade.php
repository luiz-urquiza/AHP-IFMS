@extends ('layouts.index')


@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/nodes">Nodes</a>
		</li>
    </ul>
@stop


@section ('conteudo')
 
<div class="container">

	<h3> <class="lead"> Objective: {{ $results->getObjective() }} </h3>
	
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
-->

<!-- @for ($i = 0; $i < count($results->getAlternatives()) ; $i++)
    {{ $results->getAlternatives()[$i]->descr }}: {{ $results->getScore()[$i] }} <br>
@endfor -->

<hr>
	O Critério mais relevante para o problema de decisão {{ $results->getObjective() }} é: {{$results->getBestCriteria()}} com {{$results->getBestCriteriaPriority()*100}}% de prioridade
	
<hr>	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="chart-wrapper">
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
</div> 
	

<hr>
A Alternativa mais relevante para o problema de decisão {{ $results->getObjective() }} é: {{$results->getBestAlternative()}} com {{$results->getBestAlternativeScore()*100}}% de prioridade
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

<!--
	os dois scripts abaixo são necessários para colocar os labels nos gráficos 
	é necessário instalar o plugin também
	npm install chartjs-plugin-datalabels --save
 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

	<script>

		//Data dos Critérios
			const data = {
				labels: [
					@foreach($results->getCriteria() as $a)
					'{{$a['descr']}}',
					@endforeach
					],
				datasets: [{
					label: '% of priority of alternatives for the objective: {{$results->getObjective()}}',
					data: [
						@foreach($results->getPriority() as $s)
						{{$s*100}},
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
					borderWidth: 1,
					datalabels: { //formatação do label
						color: 'black',
						anchor: 'end',
						align: 'top',
						offset: 0
					}
				}]
			};
			
			//Configurações Gráfico 1
			const config = {
				type: 'bar',
				data,
				plugins: [ChartDataLabels], //plugin dos labels
				options: {
					//configuração do label
					plugins: {
						datalabels: {
							formatter: function(value, context) {
								//return context.chart.data.labels[context.dataIndex];
								//return context.dataIndex + ': ' + Math.round(value*100) + '%';
								//return context.dataIndex + ': ' + Math.round(value*100) + '%';
								return value + '%';
								}
								}
							},

					scales: {
						y:{
							beginAtZero: true,
							grid: {
								borderColor: 'black',
								borderWidth: 1,
								display: false
							}
						},
						x:{
							grid: {
								borderColor: 'black',
								borderWidth: 1,
								display: false
							}
						}
					}
				}
			};

			//Renderiza o Gráfico 1
			const MyChart = new Chart( 
			document.getElementById('myChart'),
			config
			);
						

			//Data das Alternativas
			const data2 = {
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
					borderWidth: 1,
					datalabels: { //formatação do label
						color: 'black',
						anchor: 'end',
						align: 'top',
						offset: 0
					}
					
				}]
			};

			//Configurações Gráfico 2
			const config2 = {
				type: 'bar',
				
				data: data2,
				plugins: [ChartDataLabels], //plugin dos labels
				options: {
					//configuração do label
					plugins: {
						datalabels: {
							formatter: function(value, context) {
								//return context.chart.data.labels[context.dataIndex];
								//return context.dataIndex + ': ' + Math.round(value*100) + '%';
								//return context.dataIndex + ': ' + Math.round(value*100) + '%';
								return value + '%';
								}
								}
							},
					scales: {
						y:{
							beginAtZero: true,
							grid: {
								borderColor: 'black',
								borderWidth: 1,
								display: false
							}
						},
						x:{
							grid: {
								borderColor: 'black',
								borderWidth: 1,
								display: false
							}
						}
					}
				}
			};
			
			////Renderiza o Gráfico 1
			const MyChart2 = new Chart( 
			document.getElementById('myChart2'),
			config2
			);
		
</script>
@stop