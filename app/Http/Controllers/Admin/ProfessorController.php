<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessorRequest;
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::orderBy('nome', 'asc')->get();
        //teste (ok)
        // dd($professores);
        return view('admin.professores.index', compact('professores'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            //adicionar
            $action = route('professor.store');
            return view('admin.professores.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
     //Metodo adicionar



        //create object
        $professor = new Professor();

        $professor->nome = $request->input('nome');
        $professor->idade = $request->input('idade');
        $professor->email = $request->input('email');
        $professor->telefone = $request->input('telefone');
        $professor->obs = $request->input('obs');

        $request->session()->flash('sucesso', "Professor $request->professor inserido(a) com sucesso!");




        $professor->save();


        return redirect()->route('professor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
               $professor = Professor::find($id);
               $action = route('professor.update', $professor->id);
               return view('admin.professores.form', compact('professor', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessorRequest $request, $id)
    {
    //Editar
    $professor = Professor::find($id);
    $professor->nome = $request->nome;
    $professor->idade = $request->idade;
    $professor->email = $request->email;
    $professor->telefone = $request->telefone;
    $professor->obs = $request->obs;
    $professor->save();

    $request->session()->flash('sucesso',  "Professor(a) atualizada com sucesso!");
    return redirect()->route('professor.index');
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
        Professor::destroy($id);
        $request->session()->flash('sucesso', "Professor(a) excluída com sucesso!");
        return redirect()->route('professor.index');
    }
}
