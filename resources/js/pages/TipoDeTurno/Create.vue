<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

// Recebe os dados que o Controller mandou (o array 'cursos')
defineProps({
    cursos: Array,
});

// Função para confirmar a exclusão com segurança
const confirmarExclusao = (event) => {
    if (!confirm('Tem certeza que deseja excluir este curso?')) {
        event.preventDefault();
    }
};
</script>

<template>
    <Head title="Tipos De Turno" />

</template>