<script setup>
import SubmitButton from '@/Components/SubmitButton.vue';
import TextBox from '@/Components/TextBox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';



const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const login = () => {
    form.post(route('authenticate'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <GuestLayout>
        <div class="flex flex-col w-96 shadow rounded-lg bg-slate-900 p-4">
            <form @submit.prevent="login" class="flex flex-col gap-4 text-gray-300">
                <div>
                    <label for="email" class="block mb-2 text-sm font-semibold">Email Address</label>
                    <TextBox type="email" id="email" v-model="form.email" autocomplete="email" />
                    <span class="text-xs text-red-600">{{ form.errors.email }}</span>
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-semibold">Password</label>
                    <TextBox type="password" id="password" v-model="form.password" autocomplete="current-password" />
                    <span class="text-xs text-red-600">{{ form.errors.password }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-1">
                        <input type="checkbox" id="remember" v-model="form.remember" class="accent-blue-600 focus:outline-blue-600">
                        <label for="remember" class="text-sm font-semibold">Remember Me</label>
                    </div>
                    <Link href="/" class="text-sm font-semibold hover:underline" tabindex="-1">Forgot Password?</Link>
                </div>

                <SubmitButton :disabled="form.processing" label="Log in" />
            </form>
        </div>
        <div class="p-4 rounded-lg w-96 border border-gray-500">
            <span class="text-xs block text-center text-white">
                Don't have an account yet ?
                <Link href="" class="text-white font-bold hover:underline">Create an Account</Link>
            </span>
        </div>
    </GuestLayout>
</template>