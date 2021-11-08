@extends ('layouts.index')

@section ('menu')
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/objetivos">Objetivos</a>
		</li>
	</ul>
@stop

@section ('conteudo')
<div class="card">
  <div class="card-header">
    <h3>Critérios do Objetivo {{ $objetivo["id"] }} - {{ $objetivo["descricao"] }}</h3>
    <div>
      <a class="btn btn-primary" href="/formCreateCriterio/{{ $objetivo['id'] }}">Novo Critério</a>
    </div>
  </div>
  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Descrição</th>
          <th>Operações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($objetivo->criterios as $criterio)
        <tr>
          <td>{{ $criterio->id }}</td>
          <td>{{ $criterio->descricao }}</td>
          <td>
            <div class="btn-group">
          <a class="btn btn-sm btn-primary" href="\criterio\{{$criterio->id}}\alterar">Alterar</a>
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#excluir_{{$criterio->id}}">Excluir</button>

              <!-- Modal aqui -->
              <!-- The Modal -->
              <div class="modal" id="excluir_{{$criterio->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Deseja excluir o Criterio #{{$criterio->id}}?</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <strong>Descrição:</strong> {{$criterio->descricao}}
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="/criterio/{{$criterio->id}}/excluir">Excluir</a>
                    </div>
                  </div>

                  </div>
                </div>
              </div>


            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
      <a class="btn btn-primary" href="/formCreateCriterio/{{ $objetivo['id'] }}">Novo Critério</a>
    </div>
  </div>
</div>
<!--
<table class="table">
  <thead class="thead-light">
    <tr>
    <th>Critérios</th>
    @foreach($objetivo->criterios as $criterio)
			
				<th scope="col">{{ $criterio["nome"] }}</th>
		
			@endforeach
         </tr>
  </thead>
  <tbody>
  @foreach($objetivo->criterios as $criterio)
  <tr> 
      <th scope="row">{{$criterio["nome"]}}</th>
      @foreach($objetivo->criterios as $criterio2)
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