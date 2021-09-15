@extends('site.layouts.principal')

@section('conteudo-principal')
<section class="section lighten-4 center">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">

        @foreach ($professores as $professor)
        <a href="{{route('professores.disciplinas.index', $professor->id)}}">
            <div style="width: 250px; height: 250px;">

                <div class="row">
                    <div class="card">
                        <div class="card-image">
                            <img style="width: 250px; height: 250px;" src="{{asset("storage/$professor->foto") == 'http://localhost:8000/storage' ? "https://img-premium.flaticon.com/png/512/552/premium/552721.png?token=exp=1631669601~hmac=ee9f89c6dc8ba1787462dbf5f0018873" :asset("storage/$professor->foto")}}">
                        </div>
                        <span class="card-title black-text">{{$professor->nome}}</span>
                    </div>
                </div>
            </div>


        </a>
        @endforeach

    </div>
</section>
@endsection
