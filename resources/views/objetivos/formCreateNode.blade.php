@extends ('layouts.index')

@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/os">Objetivos</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="/nodes">Nodes</a>
		</li>
    </ul>
@stop
@section ('conteudo')
<div class="card">
  <div class="card-header">
    <h3>Create new Decision Problem</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="/createNode">
        @csrf

        <div class="form-group">
        <label for="descricao">Name:</label>
        <input type="text" class="form-control" placeholder="Decision Problem Name" id="descricao" name="descricao">
      </div>
      <div class="btn-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-danger" href="/nodes">Cancel</a>
      </div>
    </form>
  </div>
</div>
@stop