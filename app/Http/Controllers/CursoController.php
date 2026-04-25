<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use Inertia\Inertia; // A ponte mágica entre o Laravel e o Vue.js

class CursoController extends Controller
{
    /**
     * READ: Lista todos os registros.
     * Geralmente a tela inicial do seu CRUD (uma tabela).
     */
    public function index()
    {
        // Busca todas as disciplinas no banco. 
        // O get() transforma a busca em uma Collection de objetos.
        $disciplinas = Disciplina::all();

        // Envia para o arquivo resources/js/Pages/Disciplinas/Index.vue
        // O segundo parâmetro é um array com os dados (as "props" do Vue)
        return Inertia::render('Disciplinas/Index', [
            'disciplinas' => $disciplinas
        ]);
    }

    /**
     * CREATE: Apenas exibe o formulário vazio de cadastro.
     */
    public function create()
    {
        // Não precisa buscar dados, apenas abre a tela do formulário
        return Inertia::render('Curso/Criar');
    }

    /**
     * STORE: Recebe os dados do formulário (POST) e salva no banco.
     */
    public function store(Request $request)
    {
        // 1. Validação (Sempre valide o que vem do frontend!)
        $request->validate([
            'nome' => 'required|string|max:255|unique:curso,nome',
        ], [
            'nome.required' => 'O nome do curso é obrigatório.',
            'nome.unique' => 'Este curso já está cadastrado.'
        ]);

        // 2. Salva no banco (O Model aqui usa aquele $fillable que configuramos)
        Curso::create([
            'nome' => $request->nome,
        ]);

        // 3. Redireciona de volta para a lista (index) com uma mensagem de sucesso
        return redirect()->route('curso.index')->with('success', 'Disciplina criada com sucesso!');
    }

    /**
     * EDIT: Busca um registro específico e abre o formulário preenchido.
     */
    public function edit(Curso $curso)
    {
        // O Laravel é inteligente (Route Model Binding): ele já busca a disciplina pelo ID na URL
        // Ex: /disciplinas/5/edit -> Ele já traz a disciplina de ID 5 na variável $disciplina

        return Inertia::render('Curso/Editar', [
            'curso' => $curso // Manda o objeto pro Vue preencher os inputs
        ]);
    }

    /**
     * UPDATE: Recebe os dados atualizados do formulário (PUT/PATCH) e altera no banco.
     */
    public function update(Request $request, Curso $curso)
    {
        // 1. Validação (Ignorando o ID atual na regra de 'unique' para não dar erro)
        $request->validate([
            'nome' => 'required|string|max:255|unique:curso,nome,' . $curso->id,
        ]);

        // 2. Atualiza os dados do objeto e salva
        $curso->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * DELETE: Exclui o registro (ou aplica o SoftDelete).
     */
    public function destroy(Curso $curso)
    {
        // Como o Model tem SoftDeletes, isso apenas preenche a coluna 'deleted_at'
        $curso->delete();

        return redirect()->route('curso.index')->with('success', 'Curso removido!');
    }
}