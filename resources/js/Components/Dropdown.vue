<script setup>
import { Menu, MenuButton, MenuItems } from '@headlessui/vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <Menu as="div" class="relative">
        <MenuButton>
            <slot name="toggler" />
        </MenuButton>
        <Transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform scale-90 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition ease-in duration-100"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-90 opacity-0" >
            <MenuItems as="ul" class="absolute z-50 right-0 w-56 min-w-max rounded-lg shadow-lg shadow-slate-900 bg-slate-900 mt-2 text-gray-400">
                <slot name="content"/>
            </MenuItems>
        </Transition>
    </Menu>
</template>