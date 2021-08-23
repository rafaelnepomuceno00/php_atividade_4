@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
    <form action="{{$action}}" method="post">
@csrf
@isset($professor)
@method('PUT')
@endisset
<div class="input-field">
    <label for="nome">Professor</label>
    <input type="text" name="nome" id="nome" value="{{old('nome', $professor->nome ?? '')}}" />
    @error('nome')
    <span class="red-text text-accent-3">{{$message}}</span>
    @enderror
</div>
<div class="input-field">
    <label for="idade">Idade</label>
    <input type="number" name="idade" id="idade" value="{{old('idade',$professor->idade?? '')}}" />
    @error('idade')
    <span class="red-text text-accent-3">{{$message}}</span>
    @enderror
</div>


<div class="input-field">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{old('email',$professor->email ?? '')}}" />
    @error('email')
    <span class="red-text text-accent-3">{{$message}}</span>
    @enderror
</div>
<div class="input-field">
    <label for="telefone">Telefone</label>
    <input type="number" name="telefone" id="telefone" value="{{old('telefone',$professor->telefone ?? '')}}" />
    @error('telefone')
    <span class="red-text text-accent-3">{{$message}}</span>
    @enderror
</div>
<div class="input-field">
    <label for="obs">Oberservações</label>
    <input type="text" name="obs" id="obs" value="{{old('obs',$professor->obs ?? '')}}" />
    @error('obs')
    <span class="red-text text-accent-3">{{$message}}</span>
    @enderror
</div>
<div class="right-align">
    <a href="{{route('professor.index')}}" class=" btn waves-effect red darken-3">
        Cancelar
    </a>
    <button class="btn waves-effect waves-light green darken-3" type="submit">
        <i class='large material-icons '>save</i>
    </button>
</div>
</form>
</section>
@endsection
