<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;

class DisciplinasController extends Controller
{
    public function disciplinas()
    {


        $disciplinas = Disciplina::all();
        //teste de recebimento de variáveis
        // dd($disciplinas);


        return view('admin.disciplinas.index', compact('disciplinas'));
    }
}
