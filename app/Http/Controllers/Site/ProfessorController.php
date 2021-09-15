<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::orderBy('nome')->get();
        foreach ($professores as $professor) {
            $foto = Foto::where('professor_id', $professor->id)->get();
            if (isset($foto[0])) {

                $professor->foto = $foto[0]->url;
            }

        }
        // dd($professores);
        return view('site.layouts.professores.index', compact('professores'));
    }
}
