<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDeTurno;
use Inertia\Inertia;


class TipoDeTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_de_turno = TipoDeTurno::paginate(10);

        return Inertia::render('TipoDeTurno/Index', [
            'TipoDeTurno' => $tipos_de_turno
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('TipoDeTurno/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
        $request->validate([
            
            'nome' => 'required|string|max:255|unique:tipos_de_turno,nome',

        ], [
            'nome.required' => 'O nome do Tipo de Turno é obrigatório.',
            'nome.unique' => 'Este Tipo de Turno já está cadastrado.'
        ]);

        
        TipoDeTurno::create([
            'nome' => $request->nome,
        ]);

        
        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoDeTurno $tipo_de_turno)
    {
        return Inertia::render('TipoDeTurno/Show', [
            'tipo_de_turno' => $tipo_de_turno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDeTurno $tipo_de_turno)
    {
         return Inertia::render('TipoDeTurno/Edit', [
            'tipo_de_turno' => $tipo_de_turno
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoDeTurno $tipo_de_turno)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:tipos_de_turno,nome,' . $tipo_de_turno->id,
        ]);

        // 2. Atualização
        $tipo_de_turno->update([
            'nome' => $request->nome,
        ]);

        // 3. Redirecionamento
        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno atualizado com sucesso!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoDeTurno $tipo_de_turno)
    {

        $tipo_de_turno->delete();

        return redirect()->route('tipos_de_turno.index')->with('success', 'Tipo de Turno removido!');
    }
}
