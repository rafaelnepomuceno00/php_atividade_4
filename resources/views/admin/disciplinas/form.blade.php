@extends('admin.layouts.principal')
@section('conteudo-principal')
<section class="section">
    <form action="{{route('formAdicionar')}}" method="post">

        @csrf
        <div class="input-field">
            <label for="nome">Disciplina</label>
            <input type="text" name="nome" id="nome" />
            @error('nome')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="professor">Professor</label>
            <input type="text" name="professor" id="professor" />
            @error('professor')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="cargahr">Carga Horária</label>
            <input type="text" name="cargahr" id="cargahr" />
            @error('cargahr')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="right-align">
            <a href="{{url()->previous()}}" class=" btn waves-effect red darken-3">
                Cancelar
            </a>
            <button class="btn waves-effect waves-light green darken-3" type="submit">
                <i class='large material-icons '>save</i> 
            </button>
        </div>
    </form>
</section>
@endsection()