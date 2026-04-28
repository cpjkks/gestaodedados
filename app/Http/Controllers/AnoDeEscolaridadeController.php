<?php
namespace App\Http\Controllers;
use App\Models\AnoDeEscolaridade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnoDeEscolaridadeController extends Controller
{
    public function index() {
        return Inertia::render('AnoDeEscolaridade/Index', ['anos_de_escolaridade' => AnoDeEscolaridade::all()]);
    }
    public function create() {
        return Inertia::render('AnoDeEscolaridade/Create');
    }
    public function store(Request $request) {
        $request->validate(['nome' => 'required|string|unique:anos_de_escolaridade,nome']);
        AnoDeEscolaridade::create(['nome' => $request->nome]);
        return redirect()->route('anos_de_escolaridade.index')->with('success', 'Criado!');
    }
    public function edit(AnoDeEscolaridade $ano_de_escolaridade) {
        return Inertia::render('AnoDeEscolaridade/Edit', ['ano_de_escolaridade' => $ano_de_escolaridade]);
    }
    public function update(Request $request, AnoDeEscolaridade $ano_de_escolaridade) {
        $request->validate(['nome' => 'required|string|unique:anos_de_escolaridade,nome,' . $ano_de_escolaridade->id]);
        $ano_de_escolaridade->update(['nome' => $request->nome]);
        return redirect()->route('anos_de_escolaridade.index')->with('success', 'Atualizado!');
    }
    public function destroy(AnoDeEscolaridade $ano_de_escolaridade) {
        $ano_de_escolaridade->delete();
        return redirect()->route('anos_de_escolaridade.index')->with('success', 'Removido!');
    }
}