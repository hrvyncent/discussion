<script setup>
defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<template>
    <input 
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)"
        class="block w-full rounded-lg px-4 py-2 text-sm bg-slate-900 border border-gray-500 focus:ring-1 focus:outline-none focus:border-blue-600 focus:ring-blue-600"
    />
</template>