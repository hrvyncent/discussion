<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import { computed, ref } from 'vue';

const form = useForm({
    s: '',
})

const user = computed(() => {
    return usePage().props.value.auth.user
})

const avatar = computed(() => {
    const email = user.value.email
    return `https://gravatar.com/avatar/${email}?s=50`
})

const search = () => {
    form.get(route('search'))
}
</script>

<template>
    <div class="flex flex-col relative">
        <header class="sticky top-0 p-4">
            <div class="flex items-center gap-8 w-full max-w-7xl mx-auto">
                <span class="flex items-center gap-3">
                    <i class="fa-brands fa-laravel text-4xl text-red-600"></i>
                    <Link class="text-lg text-white">Webcussion</Link>
                </span>
                <div class="w-full relative text-white">
                    <form @submit.prevent="search" class="relative flex items-center w-full group">
                        <i class="fa-solid fa-search absolute left-3 text-gray-400 group-focus-within:text-blue-600"></i>
                        <input type="text" placeholder="Search Topics" v-model="form.s" class="pl-9 py-2 text-sm block rounded-lg w-full bg-slate-700 border border-gray-600 focus:ring-1 caret-inherit focus:ring-blue-600 focus:border-blue-600 focus:outline-none" />
                    </form>
                </div>
                <nav class="flex items-center gap-4 ml-auto text-gray-200">
                    <Dropdown>
                        <template #toggler>
                            <img :src="avatar" class="rounded-full" :title="user.email"/>
                        </template>
                        <template #content>
                            <MenuItem as="li">
                                <div class="flex items-center gap-2 p-4 border-b border-gray-700 text-white">
                                    <i class="fa-solid fa-user-circle"></i>
                                    <span class="text-sm">{{ $page.props.auth.user.email }}</span>
                                </div>
                            </MenuItem>
                            <MenuItem as="li">
                                <Link class="block text-sm font-semibold p-4 hover:text-white">Account Settings</Link>
                            </MenuItem>
                            <MenuItem as="li">
                                <Link as="button" :href="route('logout')" method="POST" class="block w-full text-start text-sm font-semibold p-4 hover:text-white">Logout</Link>
                            </MenuItem>
                        </template>
                    </Dropdown>
                </nav>
            </div>
        </header>
        <main class="flex flex-col p-4">
            <slot />
        </main>
    </div>
</template>