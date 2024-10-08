<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = \App\Models\Aluno::all();
        return view('index', compact('alunos'));
    }



    public function store(Request $request)
    {
        dd($request->all());
        Aluno::create($request->all());
        return redirect()->route('alunos.index');
    }
}
