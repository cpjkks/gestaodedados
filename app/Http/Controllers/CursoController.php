<?php

namespace App\Http\Controllers;

use App\Models\Curso; // Correção: Importando o Model certo
use Illuminate\Http\Request;
use Inertia\Inertia;

class CursoController extends Controller
{
    /**
     * READ: Lista todos os registros.
     */
    public function index()
    {
        // Usa a CLASSE (Singular e Maiúscula) para buscar os dados
        $cursos = Curso::all();

        // Aponta para a pasta e arquivo corretos no Vue.js
        return Inertia::render('Cursos/Index', [
            'cursos' => $cursos
        ]);
    }

    /**
     * CREATE: Exibe o formulário vazio para cadastrar um novo curso.
     */
    public function create()
    {
        // Pasta plural / Arquivo em inglês para manter o padrão
        return Inertia::render('Cursos/Create');
    }

    /**
     * STORE: Recebe os dados do formulário e salva no banco.
     */
    public function store(Request $request)
    {
        // 1. Validação
        $request->validate([
            // A regra unique vai checar a TABELA (plural e minúscula)
            'nome' => 'required|string|max:255|unique:cursos,nome',
        ], [
            'nome.required' => 'O nome do curso é obrigatório.',
            'nome.unique' => 'Este curso já está cadastrado.'
        ]);

        // 2. Criação
        Curso::create([
            'nome' => $request->nome,
        ]);

        // 3. Redirecionamento (Rota no plural gerada pelo Route::resource)
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * SHOW: Exibe os detalhes de UM registro específico (Opcional, mas faz parte do padrão).
     */
    public function show(Curso $curso)
    {
        return Inertia::render('Cursos/Show', [
            'curso' => $curso
        ]);
    }

    /**
     * EDIT: Exibe o formulário preenchido para alterar um curso.
     */
    public function edit(Curso $curso)
    {
        return Inertia::render('Cursos/Edit', [
            'curso' => $curso
        ]);
    }

    /**
     * UPDATE: Recebe os dados novos e atualiza no banco.
     */
    public function update(Request $request, Curso $curso)
    {
        // 1. Validação ignorando o ID atual
        $request->validate([
            'nome' => 'required|string|max:255|unique:cursos,nome,' . $curso->id,
        ]);

        // 2. Atualização
        $curso->update([
            'nome' => $request->nome,
        ]);

        // 3. Redirecionamento
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * DESTROY: Exclui o registro (SoftDelete).
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso removido!');
    }
}