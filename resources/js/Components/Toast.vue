<script setup>
import { TransitionRoot } from '@headlessui/vue';
import { onMounted } from 'vue';

const props = defineProps({
    active: Boolean,
    title: String,
    autohide: {
        type: Boolean,
        default: false,
    },
    duration: {
        type: Number,
        default: 5,
    }
})

const emits = defineEmits(['close'])

onMounted(() => {
    if(props.autohide) {
        setTimeout(() => {
            emits('close')
        }, props.duration * 1000);
    }
})
</script>

<template>
    <TransitionRoot
        appear
        :show="active"
        enter="transition ease-out duration-200"
        enter-from="transform translate-x-full opacity-0"
        enter-to="transform translate-x-0 opacity-100"
        leave="transition ease-in duration-200"
        leave-from="transform translate-x-0 opacity-100"
        leave-to="transform translate-x-full opacity-0">  
        <div class="fixed right-8 bottom-8 w-96 p-4 bg-slate-900 rounded-lg shadow-sm shadow-slate-900 ring-1 ring-black ring-opacity-5">
            <div class="flex flex-col">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-check-circle text-green-600"></i>
                        <span class="text-sm text-white">{{ title }}</span>
                    </div>
                    <span class="cursor-pointer" @click="$emit('close')">
                        <i class="fa-solid fa-xmark text-gray-600"></i>
                    </span>
                </div>
            </div>
        </div>
    </TransitionRoot>
</template>