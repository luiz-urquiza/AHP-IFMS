@extends ('layouts.index')

@section ('conteudo')
<h3>Inserindo novo Critério</h3>
<div>Objetivo: {{$criterio->objetivo->id}} - {{$criterio->objetivo->descricao}}</div>

<form method="POST" action="/updateCriterio">
    @csrf

    <input type="hidden" id="criterio_id" name="criterio_id" value="{{$criterio->id}}">

    <div class="form-group">
    <label for="descricao">Descrição :</label>
    <input type="text" class="form-control" placeholder="Descrição do Critério" id="descricao" name="descricao" value="{{$criterio->descricao}}">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a class="btn btn-warning" href="/objetivo/{{$criterio->objetivo->id}}/criterios">Cancelar</a>

</form>
@stop