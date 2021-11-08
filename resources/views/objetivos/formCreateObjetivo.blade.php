@extends ('layouts.index')

@section ('conteudo')
<div class="card">
  <div class="card-header">
    <h3>Inserindo novo Objetivo</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="/createObjetivo">
        @csrf

        <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" placeholder="Descrição do objetivo" id="descricao" name="descricao">
      </div>
      <div class="btn-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-danger" href="/objetivos">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@stop