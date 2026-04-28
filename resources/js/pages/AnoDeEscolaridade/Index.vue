<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
//import anos_de_escolaridade from '@/routes/anos_de_escolaridade';
import { Head, Link } from '@inertiajs/vue3';

// Recebe os dados que o Controller mandou (o array 'cursos')
defineProps({
    anos_de_escolaridade: Array,
});

// Função para confirmar a exclusão com segurança
const confirmarExclusao = (event) => {
    if (!confirm('Tem certeza que deseja excluir este Ano de Escolaridade?')) {
        event.preventDefault();
    }
};
</script>

<template>
    <Head title="Anos de Escolaridade" />

    <AppLayout>
        <div class="p-8">
            
            <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg shadow-sm flex justify-between">
                <span>{{ $page.props.flash.success }}</span>
                <button @click="$page.props.flash.success = null" class="text-green-900 font-bold">&times;</button>
            </div>

            <div class="flex justify-between items-center mb-8">
                <h2 class="font-semibold text-2xl text-gray-800">Gestão de nos de Escolaridade</h2>
                <Link 
                    href="/anos_de_escolaridade/create" 
                    class="bg-blue-600 text-white px-5 py-2 rounded-md shadow hover:bg-blue-700 transition font-medium"
                >
                    + Novo Ano de Escolaridade
                </Link>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">
                            <th class="p-4 font-medium text-gray-600">ID</th>
                            <th class="p-4 font-medium text-gray-600">Nome do Ano de Escolaridade</th>
                            <th class="p-4 font-medium text-gray-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ano in anos_de_escolaridade" :key="ano.id" class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4 text-gray-800">{{ ano.id }}</td>
                            <td class="p-4 text-gray-800 font-medium">{{ ano.nome }}</td>
                            <td class="p-4 flex gap-4">
                                <Link 
                                    :href="'/anos_de_escolaridade/' + ano.id + '/edit'" 
                                    class="text-blue-600 hover:text-blue-800 font-medium underline-offset-4 hover:underline"
                                >
                                    Editar
                                </Link>

                                <Link 
                                    :href="'/anos_de_escolaridade/' + ano.id" 
                                    method="delete" 
                                    as="button"
                                    class="text-red-600 hover:text-red-800 font-medium underline-offset-4 hover:underline"
                                    preserve-scroll
                                    @click="confirmarExclusao"
                                >
                                    Excluir
                                </Link>
                            </td>
                        </tr>
                        
                        <tr v-if="anos_de_escolaridade.length === 0">
                            <td colspan="3" class="p-12 text-center text-gray-500 italic">
                                Nenhum Ano de Escolaridade cadastrado ou importado. <br>
                                <span class="text-sm">Clique em "+ Ano de Escolaridade" para começar o registro.</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </AppLayout>
</template>