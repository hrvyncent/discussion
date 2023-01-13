<script setup>
import SubmitButton from '@/Components/SubmitButton.vue';
import TextBox from '@/Components/TextBox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    email: String,
    token: String,
})

const form = useForm({
    email: props.email,
    token: props.token,
    password: '',
    password_confirmation: '',
})

const resetPassword = () => {
    form.put(route('password.update'), {
        onFinish: () => form.reset('password','password_confirmation')
    })
}
</script>

<template>
    <Head title="Reset Password" />
    <GuestLayout>
        <div class="flex flex-col items-center gap-4">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
        </div>
        <div class="flex flex-col w-96 shadow rounded-lg bg-slate-900 p-4">
            <form @submit.prevent="resetPassword" class="flex flex-col gap-4 text-gray-300">
                <div>
                    <label for="email" class="block mb-2 text-sm font-semibold">Email Address</label>
                    <TextBox type="email" id="email" v-model="form.email" autocomplete="email" readonly/>
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

                <SubmitButton :disabled="form.processing" label="Reset Password" />
            </form>
        </div>
    </GuestLayout>
</template>