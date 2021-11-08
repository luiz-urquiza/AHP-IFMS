@extends ('layouts.index')

@section ('conteudo')
<div class="card">
  <div class="card-header">
    <h4>Alterando Objetivo #{{$objetivo->id}}</h4>
  </div>
  <div class="card-body">
    <form method="POST" action="/updateObjetivo">
        @csrf

        <input type="hidden" id="objetivo_id" name="objetivo_id" value="{{$objetivo->id}}">


        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <input type="text" value="{{$objetivo->descricao}}" class="form-control" placeholder="Descrição do objetivo" id="descricao" name="descricao">
        </div>
        <div class="btn-group">
          <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
          <a class="btn btn-sm btn-danger" href="/objetivos">Cancelar</a>
        </div>
    </form>
  </div>
</div>
@stop