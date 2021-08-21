@extends('admin.layouts.principal')

@section('conteudo-principal')
<section>
    <table>
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>Carga Horária</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($disciplinas as $diciplina)
            <tr>
                <td>{{$diciplina->nome}}</td>
                <td>{{$diciplina->professor}}</td>
                <td>{{$diciplina->cargahr}}</td>
                <td class="right-align">
                    <a href="{{route('disciplinas.edit', $diciplina->id)}}">

                        <span>
                            <i class="material-icons">edit</i>
                        </span>
                    </a>
                    <form action="{{route('disciplinas.destroy', $diciplina->id)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button style="border: none; background-color: transparent;">
                            <span style="cursor:pointer">
                                <i class="material-icons red-text">delete_forever</i>
                            </span>

                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Não existem disciplinas cadastradas</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class='fixed-action-btn'>
        <a class='btn-floating btn-large waves-effect waves-light red accent-4' href="{{route('disciplinas.create')}}">
            <i class='large material-icons '>
                add
            </i></a>
    </div>

</section>
@endSection
