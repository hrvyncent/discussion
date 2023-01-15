<script setup>
import { Link } from '@inertiajs/inertia-vue3'

defineProps({
    active: {
        type: Boolean,
        default: false,
    },
})
</script>

<template>
    <Link class="block px-4 py-3 text-sm text-gray-200" :class="{ 'bg-slate-900 border-r-4 border-blue-600': active }">
        <slot />
    </Link>
</template>