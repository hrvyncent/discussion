<script setup></script>

<template>
    <main class="flex flex-col items-center gap-8 py-12 h-screen overflow-y-auto">
        <slot />
        <span class="text-sm text-gray-600">
            &copy; {{ new Date().getFullYear() }}
        </span>
    </main>
</template>