@extends('admin.layouts.principal')

@section('conteudo-principal')
<section class="section">
    <table>
        <thead>
            <tr>
                <th>Professor</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($professores as $professor)
            <tr>
                <td>{{$professor->nome}}</td>
                <td>{{$professor->idade}}</td>
                <td>{{$professor->email}}</td>
                <td>{{$professor->telefone}}</td>
                <td>{{$professor->obs}}</td>
                <td class="right-align">
                    <a href="{{route('professor.edit', $professor->id)}}">

                        <span>
                            <i class="material-icons">edit</i>
                        </span>
                    </a>
                    <form action="{{route('professor.destroy', $professor->id)}}" method="POST" style="display: inline;">
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
                <td colspan="2">Não existem professores cadastradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class='fixed-action-btn'>
        <a class='btn-floating btn-large waves-effect waves-light red accent-4' href="{{route('professor.create')}}">
            <i class='large material-icons '>
                add
            </i></a>
    </div>

</section>
@endsection
