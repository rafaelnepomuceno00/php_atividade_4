@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <form action="{{route('professor.fotos.store', $professor->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="file-field input-field">
            <div class="btn waves-effect waves-light blue accent-4">
                <span>Selecionar Foto</span>
                <input type="file" name="foto" />
            </div>
            <div class="file-path-wrapper">
                <input type="text" class='file-path validate'>
            </div>
            @error('foto')
            <span class="red-text text-accent-3">{{$message}}</span>
            @enderror
        </div>

        <div class="right-align">
            <a href="{{url()->previous()}}" class="btn-flat red accent-4 waves-effect">Cancelar</a>

            <button class="btn waves-effect green waves-light" type="submit">
                Enviar
            </button>
        </div>
    </form>
</section>
@endsection
