@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
<div class='fixed-action-btn'>
        <a class='btn-floating btn-large waves-effect waves-light red accent-4' href="{{route('professor.create')}}">
            <i class='large material-icons '>
                add
            </i></a>
    </div>
</section>
@endsection
