<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use App\Models\Professor;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index($idProfessor)
    {
        $professor = Professor::find($idProfessor);
        $disciplinas = Disciplina::where('professor_id', $idProfessor)->paginate(env('PAGINACAO'));
        return view('site.layouts.professores.disciplinas.index', compact('professor', 'disciplinas'));
    }
}
