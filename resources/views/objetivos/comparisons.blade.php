@extends ('layouts.index')

@section ('menu')
<ul class="navbar-nav mr-auto">
     <li class="nav-item">
        <a class="nav-link" href="/nodes">Nodes</a>
    </li>
</ul>

@stop



@section ('conteudo')
<?php
$i = 0;
$score = array(1/9, 1/8, 1/7, 1/6, 1/5, 1/4, 1/3, 1/2);
?>
<form method="POST" action="/UpdateScore/{{$id}}">
    @csrf
    @foreach($goal as $g)
    <hr><b>In respect to <i>{{ $g->descr }}</i></b>
    <hr>

    <table class="table">
        <tbody>
            @foreach($itens as $c)
            <tr>
                <td>{{$target[0]->descr}} x {{ $c->descr }}</td>
                <td>
                    <select name="score{{$i}}" class="custom-select">
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[0]}}">1/9 - {{ $c->descr }} is very strongly preferable to {{$target[0]->descr}}</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[1]}}">1/8 - Intermediate judment</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[2]}}">1/7 - {{ $c->descr }} is very strongly preferable to {{$target[0]->descr}}</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[3]}}">1/6 - Intermediate judment </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[4]}}">1/5 - {{ $c->descr }} is strongly preferable to {{$target[0]->descr}}</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[5]}}">1/4 - Intermediate judment </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[6]}}">1/3 - {{ $c->descr }} is moderately preferable to {{$target[0]->descr}}</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};{{$score[7]}}">1/2 - Intermediate judment </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};1" selected>1 - {{$target[0]->descr}} is indifferent to {{ $c->descr }}</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};2">2 - Intermediate judment </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};3">3 - {{$target[0]->descr}} is moderately preferable to {{ $c->descr }} </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};4">4 - Intermediate judment</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};5">5 - {{$target[0]->descr}} is strongly preferable to {{ $c->descr }} </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};6">6 - Intermediate judment</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};7">7 - {{$target[0]->descr}} is very strongly preferable to {{ $c->descr }} </option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};8">8 - Intermediate judment</option>
                        <option value="{{$g->id}};{{$target[0]->id}};{{$c->id}};9">9 - {{$target[0]->descr}} is extremely preferable to {{ $c->descr }} </option>
                    </select>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>

    @endforeach
    <hr>
    <div class="btn-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-danger" href="/nodes">Cancel</a>
    </div>
    <input type="hidden" name="counter" value="{{$i}}">
</form>
@stop