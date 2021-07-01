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
            </tr>
            @empty
            <tr><td colspan="2">Não existem disciplinas cadastradas</td></tr>
            @endforelse
        </tbody>
    </table>
</section>
@endSection
