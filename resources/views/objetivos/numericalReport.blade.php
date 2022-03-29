@extends ('layouts.index')


@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/nodes">Nodes</a>
		</li>
    </ul>
@stop


@section ('conteudo')
<div class="card">
<div class="card-body">
 <h5 class="card-title">Criterios</h5>
 <table class="table">
    <thead class="thead-light"> 
    <tr>
        <th>Critérios</th>
        @foreach($results->getCriteria() as $q)
        
            <th scope="col">{{$q["descr"]}}</th>
        
        @endforeach
        
    </tr>
    </thead>
    <tbody>
        <!--{{$i=-1}}
            foreach ($j_criteria as $c) {
            foreach ($c as $score) {
                printf("%.2f&nbsp;&nbsp;&nbsp;&nbsp;", $score);
            }
            echo "<br>";
        }
--> 
 

    @foreach($j_criteria as $c)
    
    <tr>
    <td scope="col">{{$results->getCriteria()[++$i]["descr"]}}</td>
        @foreach($c as $jc)
                    
            <td scope="col">{{$jc}}</td>
                    
        @endforeach
        
    </tr>@endforeach

   

 
  </tbody>
 </table>

 </div>
</div>
 <hr>
 <div class="card">
 <div class="card-body">

 <table class="table">
    <thead class="thead-light"> 
    <tr>
        <th>Alternativas</th>
       @foreach($results->getAlternatives() as $a)

            <th scope="col">{{$a["descr"]}}</th>
        
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($results->getAlternatives() as $a)
       
                
        <tr>
        
        <td scope="col">{{$a["descr"]}}</td>
        

        </tr>
        

    @endforeach

  </tbody>
 </table>
    
</div>
    
    
    <!-- 

 <h5 class="card-title">Score</h5>

 @foreach($results->getScore() as $s)

 <div class="card-body">

 <p class="card-text">{{ $s }}</p>
 </div>

 @endforeach


 @for ($i = 0; $i < count($results->getAlternatives()) ; $i++)
    {{ $results->getAlternatives()[$i]->descr }}: {{ $results->getScore()[$i] }} <br>
 @endfor  -->

    </div>
 </div> 
 @stop