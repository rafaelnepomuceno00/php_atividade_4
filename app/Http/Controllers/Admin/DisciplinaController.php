<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\Request;

use App\Http\Requests\DisciplinaRequest;
use App\Models\Professor;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {




        $disciplinas = Disciplina::orderBy('nome', 'asc');
        //teste de recebimento de variáveis
        // dd($request);

        $professor_id =$request->professor_id;
        $nome = $request->disciplina;

        if ($request->professor_id) {
            $disciplinas->where('professor_id', $request->professor_id);
        }

        if ($request->disciplina) {
            $disciplinas->where('nome', 'like', "%$request->disciplina%");
        }

        $disciplinas = $disciplinas->paginate(env('PAGINACAO'))->withQueryString();

        $professores = Professor::orderBy('nome')->get();

        return view('admin.disciplinas.index', compact('disciplinas', 'professores', 'nome', 'professor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //adicionar
        $professores = Professor::all();
        $action = route('disciplinas.store');
        return view('admin.disciplinas.form', compact('action', 'professores'));
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
        $disciplina->professor_id = $request->input('professor_id');
        $disciplina->cargahr = $request->input('cargahr');
        $disciplina->curso = $request->input('curso');
        $disciplina->periodo = $request->input('periodo');

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
        $professores = Professor::all();
        $disciplina = Disciplina::find($id);
        $action = route('disciplinas.update', $disciplina->id);
        return view('admin.disciplinas.form', compact('disciplina', 'action', 'professores'));
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
        $disciplina->professor_id = $request->professor_id;
        $disciplina->cargahr = $request->cargahr;
        $disciplina->curso = $request->curso;
        $disciplina->periodo = $request->periodo;
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

    public function show($id)
    {

        $disciplina = Disciplina::find($id);
        return view('admin.disciplinas.show', compact('disciplina'));
    }
}
