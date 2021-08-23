@extends('admin.layouts.principal')
@section('conteudo-principal')
<section class="section">
    <form action="{{$action}}" method="post">

        @csrf
        @isset($disciplina)
        @method('PUT')
        @endisset
        <div class="input-field">
            <label for="nome">Disciplina</label>
            <input type="text" name="nome" id="nome" value="{{old('nome', $disciplina->nome ?? '')}}" />
            @error('nome')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="professor_id">Professor</label>
            <select name="professor_id" id="professor_id">
                <option value="" disabled selected> Selecione um professor</option>
                @foreach ($professores as $professor)
                <option value="{{$professor->id}}" {{old('professor_id', $disciplina->professor->id ?? '')== $professor->id ? 'selected' : ''}}>
                    {{$professor->nome}}
                </option>
                @endforeach
            </select>
            @error('professor_id')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="curso">Curso</label>
            <input type="text" name="curso" id="curso" value="{{old('curso',$disciplina->curso ?? '')}}" />
            @error('curso')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="cargahr">Carga Horária</label>
            <input type="text" name="cargahr" id="cargahr" value="{{old('cargahr',$disciplina->cargahr ?? '')}}" />
            @error('cargahr')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="input-field">
            <label for="periodo">Periodo</label>
            <input type="number" name="periodo" id="periodo" value="{{old('periodo',$disciplina->periodo ?? '')}}" />
            @error('periodo')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>
        <div class="right-align">
            <a href="{{route('disciplinas.index')}}" class=" btn waves-effect red darken-3">
                Cancelar
            </a>
            <button class="btn waves-effect waves-light green darken-3" type="submit">
                <i class='large material-icons '>save</i>
            </button>
        </div>
    </form>
</section>
@endsection()
