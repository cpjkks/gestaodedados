<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDeTurno;


public function __construct()
{
    $this('auth');
}

class TipoDeTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_de_turno = TipoDeTurno::paginate(10);

        return Inertia::render('TiposDeTurno/Index', [
            'TiposDeTurno' => $tipos_de_turno
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('TiposDeTurno/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
        $request->validate([
            
            'nome' => 'required|string|max:255|unique:tipodeturno,nome',

        ], [
            'nome.required' => 'O nome do Tipo de Turno é obrigatório.',
            'nome.unique' => 'Este Tipo de Turno já está cadastrado.'
        ]);

        
        TiposDeTurno::create([
            'nome' => $request->nome,
        ]);

        
        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('TiposDeTurno/Show', [
            'tipos_de_turno' => $tipos_de_turno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return Inertia::render('TiposDeTurno/Edit', [
            'tipos_de_turno' => $tipos_de_turno
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:tipodeturno,nome,' . $tipos_de_turno->id,
        ]);

        // 2. Atualização
        $tipos_de_turno->update([
            'nome' => $request->nome,
        ]);

        // 3. Redirecionamento
        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno atualizado com sucesso!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposDeTurno $tipos_de_turno)
    {

        $tipos_de_turno->delete();

        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno removido!');
    }
}
