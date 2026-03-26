<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BlogCard from '@/Components/BlogCard.vue';
import Navbar from '@/Components/Navbar.vue';

defineProps({
    author: {
        type: Object,
        required: true,
    },
    articles: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head :title="`${author.name}'s Blog`" />

    <div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-300">

        <Navbar />

        <header class="border-b border-gray-100 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="mx-auto max-w-5xl px-4 py-10 text-center sm:px-6 lg:px-8">
                <div class="mb-3 inline-flex items-center justify-center rounded-full bg-cyan-50 px-4 py-1 text-sm font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                    @{{ author.username }}
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    {{ author.name }}'s Blog
                </h1>
                <p class="mt-2 text-sm text-gray-400 dark:text-gray-500">
                    {{ articles.total }} article{{ articles.total !== 1 ? 's' : '' }} published
                </p>
            </div>
        </header>

        <main class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">

            <div
                v-if="articles.data.length === 0"
                class="flex flex-col items-center justify-center py-24 text-center"
            >
                <svg class="mb-4 h-12 w-12 text-gray-300 dark:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <p class="text-gray-400 dark:text-gray-600">No articles yet.</p>
            </div>

            <div v-else class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <BlogCard
                    v-for="article in articles.data"
                    :key="article.id"
                    :article="article"
                    :sub-domain="author.sub_domain"
                />
            </div>

            <div
                v-if="articles.last_page > 1"
                class="mt-12 flex items-center justify-center gap-2"
            >
                <Link
                    v-for="link in articles.links"
                    :key="link.label"
                    :href="link.url ?? '#'"
                    v-html="link.label"
                    :class="[
                        'rounded-lg px-4 py-2 text-sm border transition',
                        link.active
                            ? 'bg-cyan-600 border-cyan-600 text-white font-semibold'
                            : 'border-gray-200 bg-white text-gray-600 hover:border-cyan-400 hover:text-cyan-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:border-cyan-500 dark:hover:text-cyan-400',
                        !link.url ? 'pointer-events-none opacity-40' : '',
                    ]"
                />
            </div>
        </main>
    </div>
</template>
