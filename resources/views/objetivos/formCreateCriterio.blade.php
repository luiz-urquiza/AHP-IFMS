@extends ('layouts.index')

@section ('conteudo')
<h3>Inserindo novo Critério</h3>
<div>Objetivo: {{$objetivo['id']}} - {{$objetivo['descricao']}}</div>

<form method="POST" action="/createCriterio">
    @csrf

    <input type="hidden" id="objetivo_id" name="objetivo_id" value="{{$objetivo['id']}}">

    <div class="form-group">
    <label for="descricao">Descrição :</label>
    <input type="text" class="form-control" placeholder="Descrição do Critério" id="descricao" name="descricao">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a class="btn btn-warning" href="/objetivo/{{$objetivo['id']}}/criterios">Cancelar</a>

</form>
@stop