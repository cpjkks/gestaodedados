<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// 1. Recebemos o curso que o Controller buscou no banco
const props = defineProps({
    curso: Object,
});

// 2. Iniciamos o formulário já preenchido com o nome atual do curso
const form = useForm({
    nome: props.curso.nome,
});

const submit = () => {
    // Enviamos um PUT para a rota de atualização, passando o ID
    form.put('/cursos/' + props.curso.id);
};
</script>

<template>
    <Head title="Editar Curso" />

    <AppLayout>
        <div class="p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="font-semibold text-2xl text-gray-800">Editar Curso</h2>
                <Link href="/cursos" class="text-gray-500 hover:text-gray-700 underline font-medium">
                    Cancelar
                </Link>
            </div>

            <div class="max-w-2xl bg-white shadow-sm rounded-lg border border-gray-200 p-6">
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
                        >
                        <div v-if="form.errors.nome" class="text-red-500 text-sm mt-1">
                            {{ form.errors.nome }}
                        </div>
                    </div>

                    <div class="flex items-center justify-end border-t pt-4">
                        <button 
                            type="submit" 
                            class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition font-medium"
                            :disabled="form.processing"
                        >
                            Atualizar Curso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>