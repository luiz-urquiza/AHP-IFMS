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

@foreach($goal as $g)
<hr><b>In respect to <i>{{ $g->descr }}</i></b><hr>

    <table class="table">
            <tbody>
                @foreach($itens as $c)
                <tr>
                    <td>{{$target[0]->descr}} x {{ $c->descr }}</td>
                    <td>
                        <select class="custom-select">
                            <option value="1">1 - {{$target[0]->descr}} is indifferent to {{ $c->descr }}</option>
                            <option value="1/9">1/9 - {{ $c->descr }} is extremely preferable to {{$target[0]->descr}}}</option>
                            <option value="1/8">1/8 - Intermediate judment</option>
                            <option value="1/7">1/7 - {{ $c->descr }} is very strongly preferable to {{$target[0]->descr}}</option>
                            <option value="1/6">1/6 - Intermediate judment </option>
                            <option value="1/5">1/5 - {{ $c->descr }} is strongly preferable to {{$target[0]->descr}}</option>
                            <option value="1/4">1/4 - Intermediate judment </option>
                            <option value="1/3">1/3 - {{ $c->descr }} is moderately preferable to {{$target[0]->descr}}</option>
                            <option value="1/2">1/2 - Intermediate judment </option>
                            <option value="2">2 - Intermediate judment </option>
                            <option value="3">3 - {{$target[0]->descr}} is moderately preferable to {{ $c->descr }} </option>
                            <option value="4">4 - Intermediate judment</option>
                            <option value="5">5 - {{$target[0]->descr}} is strongly preferable to {{ $c->descr }} </option>
                            <option value="6">6 - Intermediate judment</option>
                            <option value="7">7 - {{$target[0]->descr}} is very strongly preferable to {{ $c->descr }} </option>
                            <option value="8">8 - Intermediate judment</option>
                            <option value="9">9 - {{$target[0]->descr}} is extremely preferable to {{ $c->descr }} </option>
                        </select>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            </table>

@endforeach

@stop