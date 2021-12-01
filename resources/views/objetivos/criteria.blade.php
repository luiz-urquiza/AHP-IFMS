@extends ('layouts.index')

@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/os">Objetivos</a>
		</li>
    </ul>

@stop

@section ('conteudo')
<div class="card">
  <div class="card-header">
    <h3>Criteria from Decision Problem: {{ $goal->descr }}</h3>
    <div>
      <a class="btn btn-primary" href="#">Novo Critério</a>
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
        @foreach($criteria as $c)
        <tr>
          <td>{{ $c->id }}</td>
          <td>{{ $c->descr }}</td>
          <td>
            <div class="btn-group">
          <a class="btn btn-sm btn-primary" href="\comparisons\{{$goal->id}}\{{$c->id}}">Comparisons</a>
          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#excluir_{{$c->id}}">Remove</button>

              <!-- Modal aqui -->
              <!-- The Modal -->
              <div class="modal" id="excluir_{{$c->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Deseja excluir o Criterio #{{$c->id}}?</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <strong>Descrição:</strong> {{$c->descr}}
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="/criterio/{{$c->id}}/excluir">Excluir</a>
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
      <a class="btn btn-primary" href="#">Novo Critério</a>
    </div>
  </div>
</div>

@stop