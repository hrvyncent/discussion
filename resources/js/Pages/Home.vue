<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    search: String,
})
</script>

<template>
    <Head title="Home" />

    <AppLayout>
        {{ search }}
    </AppLayout>
</template>