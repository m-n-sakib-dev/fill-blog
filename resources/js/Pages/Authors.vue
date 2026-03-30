<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

defineProps({
    authors: {
        type: Array,
        required: true,
    },
});
</script>

<template>

    <Head title="Authors" />

    <div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
        <Navbar />

        <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Authors</h1>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    {{ authors.length }} writer{{ authors.length !== 1 ? 's' : '' }} on MyBlog
                </p>
            </div>

            <div v-if="authors.length === 0" class="flex flex-col items-center justify-center py-24 text-center">
                <p class="text-gray-400 dark:text-gray-600">No authors yet.</p>
            </div>

            <div v-else class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <Link
                    v-for="author in authors.filter(a => a.sub_domain)"
                    :key="author.id"
                    :href="route('user.blog', { sub_domain: author.sub_domain })"
                    class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-lg font-bold text-white">
                        {{ author.name.charAt(0).toUpperCase() }}
                    </div>
                    <div class="min-w-0">
                        <p class="truncate font-semibold text-gray-900 dark:text-white">{{ author.name }}</p>
                        <p class="truncate text-xs text-gray-400 dark:text-gray-500">@{{ author.username }}</p>
                        <p class="mt-1 text-xs font-medium text-cyan-600 dark:text-cyan-400">
                            {{ author.articles_count }} article{{ author.articles_count !== 1 ? 's' : '' }}
                        </p>
                    </div>
                </Link>
            </div>

        </div>
    </div>
</template>
