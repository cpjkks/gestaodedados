<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { Link } from '@inertiajs/vue3';

// Recebe os dados que o Controller mandou (o array 'cursos')
defineProps({
    tipo_de_turno: Array,
});

// Função para confirmar a exclusão com segurança
const confirmarExclusao = (event) => {
    if (!confirm('Tem certeza que deseja excluir este Tipo de Turno?')) {
        event.preventDefault();
    }
};
</script>

<template>
    
    <div class="flex justify-end mb-4">
        <Link href="/tipo_de_turno/create">
            <Button label="Novo" icon="pi pi-plus" severity="success" />
        </Link> 
    </div>

    <DataTable :value="tipo_de_turno" paginator :rows="5">

        <Column field="nome" header="Nome" />

        <Column header="Ações">
            <template #body="slotProps">
                <div class="flex gap-2">

                    <Link :href="route('tipo_de_turno.show', slotProps.data.id)">
                        <Button icon="pi pi-eye" severity="info" />
                    </Link>

                    <Link :href="route('tipo_de_turno.edit', slotProps.data.id)">
                        <Button icon="pi pi-pencil" severity="warning" />
                    </Link>

                </div>
            </template>
        </Column>

    </DataTable>
</template>