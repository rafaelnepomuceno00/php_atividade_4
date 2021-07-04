<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Http\Requests\DisciplinaRequest;
class DisciplinasController extends Controller
{
    public function disciplinas()
    {


        $disciplinas = Disciplina::all();
        //teste de recebimento de variáveis
        // dd($disciplinas);


        return view('admin.disciplinas.index', compact('disciplinas'));
    }
    public function formAdicionar()
    {
        return view('admin.disciplinas.form');
    }
    public function adicionar(DisciplinaRequest $request)
    {



        //create object 
        $disciplina = new Disciplina();

        $disciplina->nome = $request->input('nome');
        $disciplina->professor = $request->input('professor');
        $disciplina->cargahr = $request->input('cargahr');

        $request->session()->flash('sucesso', "Disciplina $request->disciplina inserida com sucesso!");




        $disciplina->save();


        return redirect()->route('listaDisciplinas');
    }
}
