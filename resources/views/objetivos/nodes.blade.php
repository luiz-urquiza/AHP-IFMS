@extends ('layouts.index')

@section ('menu')
    <ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="/os">Objetivos</a>
		</li>
    </ul>

@stop

@section ('conteudo')
<!-- {{ $x = 0 }}  -->
<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Decision Problem</th>
				<th>View</th>
				<th>Operations</th>
			</tr>
		</thead>
		<tbody>
@foreach($objectives as $o) 

<tr>
	<td>{{ ++$x }}</td>
	<td>
		{{ $o['descr'] }}
	</td>
	<td>
		<div class="btn-group">
			<a href="/nodes/{{ $o['id'] }}/criteria" class="btn btn-sm btn-primary" data-toggle="tooltip" title="">Criteria</a>
			<a href="/nodes/{{ $o['id'] }}/alternatives" class="btn btn-sm btn-primary" data-toggle="tooltip" title="teste">Alternatives</a>
		</div>
	</td>

	<td>
		<div class="btn-group">
			<a class="btn btn-primary btn-sm" href="/o/{{$o->id}}/alterar">Change</a>
			<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#excluir_{{$o->id}}">Remove</button>
		</div>
		<div class="modal" id="excluir_{{$o->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Are you sure? #{{$o->id}}</h4>
						<button type="button" class="close" data-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<strong>Decision Problem:</strong> {{$o->descr}}
					</div>
					<div class="modal-footer">
						<div class="btn-group">
    						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
							<a class="btn btn-danger" href="/o/{{$o->id}}/excluir">Remove</a>
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




@stop