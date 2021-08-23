@extends('admin.layouts.principal')
@section('conteudo-principal')
<section class="section">

    <div class="row">
        <span class="col s4">
            <h5>Disciplina</h5>
            <p>{{$disciplina->nome}}</p>
        </span>

        <span class="col s4">
            <h5>Curso</h5>
            <p>{{$disciplina->curso}}</p>
        </span>

        <span class="col s4">
            <h5>Professor</h5>
            <p>{{$disciplina->professor->nome}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s6">
            <h5>Período</h5>
            <p>{{$disciplina->periodo}}°</p>
        </span>

        <span class="col s6">
            <h5>Carga Horária</h5>
            <p>{{$disciplina->cargahr}} horas</p>
        </span>
    </div>




    {{-- Voltar --}}
    <div class="right align">
        <a href="{{url()->previous()}}" class="btn-flat waves-effect">Voltar</a>
    </div>


</section>
@endsection
