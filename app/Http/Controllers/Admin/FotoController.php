<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Foto;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idProfessor)
    {
        $professor = Professor::find($idProfessor);

        $fotos = Foto::where('professor_id', $idProfessor)->get();
        return view('admin.professores.fotos.index', compact('professor', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idProfessor)
    {
        $professor = Professor::find($idProfessor);
        return view('admin.professores.fotos.form', compact('professor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idProfessor)
    {
        if ($request->hasFile('foto')) {

            if ($request->foto->isValid()) {
                // $fotoURL = $request->foto->store("imoveis/$idProfessor",'public');



                $fotoURL = $request->foto->hashName("imoveis/$idProfessor");

                $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'), env('FOTO_ALTURA'));


                Storage::disk('public')->put($fotoURL, $imagem->encode());

                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->professor_id = $idProfessor;
                $foto->save();
            }
        }
        $request->session()->flash('sucesso', "Foto inserida com sucesso!");
        return redirect()->route('professor.fotos.index', $idProfessor);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idProfessor, $idFoto)
    {
        $foto = Foto::find($idFoto);
        Storage::disk('public')->delete($foto->url);


        $foto->delete();
        $request->session()->flash('sucesso', "Foto excluída com sucesso!");
        return redirect()->route('professor.fotos.index', $idProfessor);
    }
}
