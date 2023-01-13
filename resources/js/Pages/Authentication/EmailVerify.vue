<script setup>
import SubmitButton from '@/Components/SubmitButton.vue';
import GuestLayoutVue from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({})

const resend = () => {
    form.post(route('verification.send'), {
        onSuccess: () => console.log('Success'),
    })
}
</script>

<template>
    <Head title="Email Verify"/>
    <GuestLayoutVue>
        <div class="flex flex-col items-center gap-4">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
        </div>
        <div class="max-w-2xl w-full flex flex-col gap-5">
            <p class="text-2xl text-center text-gray-300">Thank you for using our webiste. Please confirm your account using the link we sent to your email address</p>
            <div class="flex flex-col items-center gap-4 text-gray-300">
                <p class="text-lg text-center text-gray-400">In case you didn't received the verification link you can click the button below so that we can resend it to you.</p>
                <form @submit.prevent="resend">
                    <SubmitButton label="Resend Verification Link" :disabled="form.processing" />
                </form>
            </div>
        </div>
    </GuestLayoutVue>
</template>