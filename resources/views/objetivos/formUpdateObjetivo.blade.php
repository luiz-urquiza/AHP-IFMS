@extends ('layouts.index')

@section ('conteudo')
<h3>Inserindo novo Objetivo</h3>

<form method="POST" action="/updateObjetivo">
    @csrf

    <input type="hidden" id="objetivo_id" name="objetivo_id" value="{{$objetivo->id}}">


    <div class="form-group">
    <label for="descricao">Descrição :</label>
    <input type="text" value="{{$objetivo->descricao}}" class="form-control" placeholder="Descrição do objetivo" id="descricao" name="descricao">
  </div>
  <button type="submit" class="btn btn-success">Salvar</button>
  <a class="btn btn-warning" href="/objetivos">Cancelar</a>
</form>
@stop