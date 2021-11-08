@extends ('layouts.index')

@section ('conteudo')
<div class="card">
  <div class="card-header">
<h3>Inserindo novo Critério</h3>
<div>Objetivo: {{$objetivo['id']}} - {{$objetivo['descricao']}}</div>
  </div>
  <div class="card-body">
    <form method="POST" action="/createCriterio">
        @csrf

        <input type="hidden" id="objetivo_id" name="objetivo_id" value="{{$objetivo['id']}}">

        <div class="form-group">
        <label for="descricao">Descrição :</label>
        <input type="text" class="form-control" placeholder="Descrição do Critério" id="descricao" name="descricao">
      </div>
      <div class="btn btn-group">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a class="btn btn-warning" href="/objetivo/{{$objetivo['id']}}/criterios">Cancelar</a>
      <div>
    </form>
  </div>
</div>
@stop