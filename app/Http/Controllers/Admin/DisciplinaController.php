<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\Request;

use App\Http\Requests\DisciplinaRequest;


class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplina::all();
        //teste de recebimento de variáveis
        // dd($disciplinas);


        return view('admin.disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //adicionar
        $action = route('disciplinas.store');
        return view('admin.disciplinas.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaRequest $request)
    {
        //Metodo adicionar



        //create object
        $disciplina = new Disciplina();

        $disciplina->nome = $request->input('nome');
        $disciplina->professor = $request->input('professor');
        $disciplina->cargahr = $request->input('cargahr');

        $request->session()->flash('sucesso', "Disciplina $request->disciplina inserida com sucesso!");




        $disciplina->save();


        return redirect()->route('disciplinas.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //FormEditar
        $disciplina = Disciplina::find($id);
        $action = route('disciplinas.update', $disciplina->id);
        return view('admin.disciplinas.form', compact('disciplina', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaRequest $request, $id)
    {
        //Editar
        $disciplina = Disciplina::find($id);
        $disciplina->nome = $request->nome;
        $disciplina->professor = $request->professor;
        $disciplina->cargahr = $request->cargahr;
        $disciplina->save();


        $request->session()->flash('sucesso',  "Disciplina $request->disciplina  atualizada com sucesso!");
        return redirect()->route('disciplinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  Request $request)
    {
        //Remover
        Disciplina::destroy($id);
        $request->session()->flash('sucesso', "Disciplina excluída com sucesso!");
        return redirect()->route('disciplinas.index');
    }
}
