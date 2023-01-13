<script setup>
const props = defineProps({
    label: String,

})
</script>

<template>
    <button type="submit" class="block px-4 py-2 text-sm border border-gray-500 bg-slate-900 rounded-lg hover:bg-slate-800 disabled:bg-slate-800 disabled:cursor-wait">
        {{ label }}
    </button>
</template>