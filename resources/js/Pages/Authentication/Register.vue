<script setup>
import SubmitButton from '@/Components/SubmitButton.vue';
import TextBox from '@/Components/TextBox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    email: '',
    password: '',
    password_confirmation: '',
})

const register = () => {
    form.post('', {
        onFinish: () => form.reset('password','password_confirmation')
    })
}
</script>

<template>
    <Head title="Create an account"/>

    <GuestLayout>
        <div class="flex flex-col items-center gap-4">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
            <h1 class="text-2xl font-bold text-white">Create an Account</h1>
        </div>
        <div class="flex flex-col w-96 shadow rounded-lg bg-slate-900 p-4">
            <form @submit.prevent="register" class="flex flex-col gap-4 text-gray-300">
                <div>
                    <label for="email" class="block mb-2 text-sm font-semibold">Email Address</label>
                    <TextBox type="email" id="email" v-model="form.email" autocomplete="email" />
                    <span class="text-xs text-red-600">{{ form.errors.email }}</span>
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-semibold">Password</label>
                    <TextBox type="password" id="password" v-model="form.password" autocomplete="new-password" />
                    <span class="text-xs text-red-600">{{ form.errors.password }}</span>
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-semibold">Confirm Password</label>
                    <TextBox type="password" id="password_confirmation" v-model="form.password_confirmation" autocomplete="new-password" />
                </div>

                <SubmitButton :disabled="form.processing" label="Sign Up" />
            </form>
        </div>
        <div class="p-4 rounded-lg w-96 border border-gray-500">
            <span class="text-xs block text-center text-white">
                Already have an account ?
                <Link :href="route('login')" class="text-white font-bold hover:underline">Login</Link>
            </span>
        </div>
    </GuestLayout>
</template>