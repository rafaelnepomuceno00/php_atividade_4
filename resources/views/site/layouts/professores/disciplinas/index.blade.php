@extends('site.layouts.principal')

@section('conteudo-principal')

<h3>Disciplinas ministrada por {{$professor->nome}}</h3>
<div class="divider"></div>
<div style="display: flex; flex-wrap: wrap;">
    @forelse ($disciplinas as $disciplina)


    <div class="row">
        <div style="width:250px;height:250px" class="col s12 m6">
            <div class="card grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{$disciplina->nome}}</span>
                    <p>Carga Horária:{{$disciplina->cargahr}}</p>
                    <p>Curso:{{$disciplina->curso}}</p>
                    <p>Período:{{$disciplina->periodo}}</p>
                </div>
            </div>
        </div>
    </div>

    @empty
    <p>Não há disciplinas cadastradas!</p>
    @endforelse
</div>

@endsection
