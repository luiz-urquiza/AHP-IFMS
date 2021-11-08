@extends ('layouts.index')

@section ('conteudo')
<div class='card'>
  <div class='card-header'>
    <h4><strong>Objetivo:</strong> {{$criterio->objetivo->id}} - {{$criterio->objetivo->descricao}}</h4>
    <p>Alterando Critério #{{$criterio->id}}</p>
  </div>
  <div class="card-body">
    <form method="POST" action="/updateCriterio">
        @csrf

        <input type="hidden" id="criterio_id" name="criterio_id" value="{{$criterio->id}}">

        <div class="form-group">
        <label for="descricao">Descrição :</label>
        <input type="text" class="form-control" placeholder="Descrição do Critério" id="descricao" name="descricao" value="{{$criterio->descricao}}">
      </div>
      <div class="btn-group">
        <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
        <a class="btn btn-sm btn-danger" href="/objetivo/{{$criterio->objetivo->id}}/criterios">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@stop