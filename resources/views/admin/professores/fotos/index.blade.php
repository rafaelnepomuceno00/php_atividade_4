@extends('admin.layouts.principal')

@section('conteudo-principal')
<style>
    /* sei que não é uma boa prática fazer isso mas estava dando erro ao usar o arquivo css na pasta public por algum motivo então usei aqui */
    img {
        border-Radius: 50%;
        width: 250px;
        height: 250px;
    }

    .flex-container {
        display: flex;
        flex-wrap: wrap;
    }

    .flex-item {
        margin: 10px;
        position: relative;
        font-size: 0;
    }

    .flex-item .btn-fechar {
        position: absolute;
        bottom: 2px;
        right: 2px;
        z-index: 100;
        background-color: #f7d2d2;
        cursor: pointer;
        opacity: 0.5;
        font-size: 22px;
        line-height: 10px;
        border-radius: 50%;
    }

    .flex-item:hover .btn-fechar {
        opacity: 1;
    }

    .flex-item button {
        height: 24px;
        border: none;
        margin: 0;
        padding: 0;
        background-color: transparent;
    }
</style>
<h4>{{$professor->nome}}</h4>

<section class="section">
    <div class="flex-container">

        @forelse ($fotos as $foto)
        <div class="flex-item">

            <spam class="btn-fechar">

                <form action="{{route('professor.fotos.destroy', [$professor->id, $foto->id])}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button style="border: none; background-color: transparent;">
                        <span style="cursor:pointer">
                            <i class="material-icons red-text">delete_forever</i>
                        </span>

                    </button>
                </form>

            </spam>
            <img src="{{asset("storage/$foto->url")}}" />
        </div>


        @empty
        <div>Não existe foto deste professor! </div>
        @endforelse

        <div class='fixed-action-btn'>
            <a class='btn-floating btn-large waves-effect waves-light red accent-4' href="{{route('professor.fotos.create', $professor->id)}}">
                <i class='large material-icons '>
                    add
                </i></a>
        </div>

    </div>
</section>
@endsection
