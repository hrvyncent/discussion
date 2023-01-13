<script setup>
import SubmitButton from '@/Components/SubmitButton.vue';
import TextBox from '@/Components/TextBox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


const form = useForm({
    email: '',
})

const sendRequest = () => {
    form.post(route('password.email'), {
        onSuccess: () => form.reset('email')
    })
}
</script>

<template>
    <Head title="Forgot Password"/>

    <GuestLayout>
        <div class="flex flex-col items-center gap-4">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
        </div>
        <div class="flex flex-col w-96 shadow rounded-lg bg-slate-900 p-4">
            <form @submit.prevent="sendRequest" class="flex flex-col gap-4 text-gray-300">
                <p class="text-sm text-gray-400">Forgot your password ? Just send us your email address and we will send you the reset link.</p>
                <div>
                    <label for="email" class="block text-sm font-semibold mb-2">Email Address</label>
                    <TextBox type="email" id="email" v-model="form.email" autocomplete="email" />
                    <span class="text-xs text-red-600">{{ form.errors.email }}</span>
                </div>

                <div class="flex flex-row-reverse items-center gap-4">
                    <SubmitButton label="Send Request" :disabled="form.processing" />
                    <Link :href="route('login')" class="text-xs text-white hover:underline">Back to Login</Link>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>