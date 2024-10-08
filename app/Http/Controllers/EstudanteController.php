<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    public function create()
    {
        return view('estudantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:estudantes',
            'idade' => 'required|integer',
        ]);

        Estudante::create($request->all());
        return redirect()->route('estudantes.index')->with('success', 'Estudante cadastrado com sucesso!');
    }
}
