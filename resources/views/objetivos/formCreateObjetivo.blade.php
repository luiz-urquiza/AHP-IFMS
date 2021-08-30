@extends ('layouts.index')

@section ('conteudo')
<h1>Inserindo novo Objetivo</h1>

<form method="POST" action="/createObjetivo">
    @csrf

    <div class="form-group">
    <label for="descricao">Descrição :</label>
    <input type="text" class="form-control" placeholder="Descrição do objetivo" id="descricao" name="descricao">
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>

</form>
@stop