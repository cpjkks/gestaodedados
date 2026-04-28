<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// 1. O 'useForm' é o coração do Inertia. Ele empacota os dados e gerencia o envio
const form = useForm({
    nome: '', // Começa vazio, combinando com a coluna 'nome' do banco
});

// 2. A função que dispara quando apertamos o botão "Salvar"
const submit = () => {
    // Dispara um POST para a URL exata que bate no método store() do Controller
    form.post('/cursos'); 
};
</script>

<template>
    <Head title="Novo Curso" />

    <AppLayout>
        <div class="p-8">
            
            <div class="flex justify-between items-center mb-8">
                <h2 class="font-semibold text-2xl text-gray-800">Cadastrar Novo Curso</h2>
                <Link href="/cursos" class="text-gray-500 hover:text-gray-700 underline font-medium">
                    Voltar para a lista
                </Link>
            </div>

            <div class="max-w-2xl bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200 p-6">
                
                <form @submit.prevent="submit" class="space-y-6">
                    
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">
                            Nome do Curso
                        </label>
                        <input 
                            id="nome" 
                            type="text" 
                            v-model="form.nome" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Ex: Ensino Médio Regular"
                            required
                        >
                        <div v-if="form.errors.nome" class="text-red-500 text-sm mt-1">
                            {{ form.errors.nome }}
                        </div>
                    </div>

                    <div class="flex items-center justify-end border-t pt-4 mt-6">
                        <button 
                            type="submit" 
                            class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition font-medium disabled:opacity-50"
                            :disabled="form.processing"
                        >
                            Salvar Curso
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </AppLayout>
</template>