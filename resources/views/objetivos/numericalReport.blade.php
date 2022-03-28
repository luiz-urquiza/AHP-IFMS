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
    @foreach($results->getCriteria() as $q)
        
                
        <tr>

        <td scope="col">{{$q["descr"]}}</td>
        
        <!-- @foreach($results->getCriteria() as $q2)
        @if($q["descr"] == $q2["descr"])
            <td>1,000</td>
        @elseif($q["descr"] < $q2["descr"])
            <td id="c{{$q['descr']}}_{{$q2['descr']}}">  
                
        @for ($i = 0; $i < count($results->getCriteria()) ; $i++)
             {{ $results->getCriteria()[$i]->descr }}: {{ $results->getScore()[$i] }} <br>
        @endfor 

        @else
            <td id="c{{$q['descr']}}_{{$q2['descr']}}"></td>   
        @endif       
        @endforeach -->
        </tr>
        
       
    @endforeach

  </tbody>
 </table>

 </div>
 <hr>
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