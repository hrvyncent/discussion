<script setup></script>

<template>
    <main class="flex flex-col items-center gap-8 py-12 h-screen overflow-y-auto">
        <div class="flex flex-col items-center gap-4">
            <i class="fa-brands fa-laravel text-5xl text-red-600"></i>
            <h1 class="text-2xl font-bold text-white">Webcussion</h1>
        </div>
        <slot />
        <span class="text-sm text-gray-600">
            &copy; {{ new Date().getFullYear() }}
        </span>
    </main>
</template>