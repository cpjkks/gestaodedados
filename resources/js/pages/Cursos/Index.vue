<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Recebe os dados que o Controller mandou (o array 'cursos')
defineProps({
    cursos: Array,
});
</script>

<template>
    <Head title="Cursos" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestão de Cursos</h2>
                <Link :href="route('cursos.create')" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                    + Novo Curso
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="pb-2">ID</th>
                                <th class="pb-2">Nome do Curso</th>
                                <th class="pb-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="curso in cursos" :key="curso.id" class="border-b hover:bg-gray-50">
                                <td class="py-2">{{ curso.id }}</td>
                                <td class="py-2">{{ curso.nome }}</td>
                                <td class="py-2 text-blue-600 hover:underline cursor-pointer">Editar</td>
                            </tr>
                            
                            <tr v-if="cursos.length === 0">
                                <td colspan="3" class="py-4 text-center text-gray-500">Nenhum curso cadastrado ainda.</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>