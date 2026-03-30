<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import AppFooter from '@/Components/AppFooter.vue';

defineProps({
    author: {
        type: Object,
        required: true,
    },
    article: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head :title="article.title" />

    <div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-300">

        <Navbar />

        <div class="mx-auto max-w-3xl px-4 pt-6 sm:px-6">
            <Link
                :href="route('user.blog', { sub_domain: author.sub_domain })"
                class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                {{ author.name }}'s Blog
            </Link>
        </div>

        <main class="mx-auto max-w-3xl px-4 py-10 sm:px-6">

            <div class="mb-6 flex flex-wrap items-center gap-3">
                <span
                    v-if="article.category"
                    class="rounded-full bg-cyan-50 px-3 py-0.5 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300"
                >
                    {{ article.category.name }}
                </span>
                <time class="text-xs text-gray-400 dark:text-gray-500">
                    {{
                        new Date(article.created_at).toLocaleDateString('en-GB', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric',
                        })
                    }}
                </time>
            </div>

            <h1 class="mb-8 text-3xl font-bold leading-tight text-gray-900 dark:text-white sm:text-4xl">
                {{ article.title }}
            </h1>

            <div class="mb-10 flex items-center gap-3 border-b border-gray-100 pb-8 dark:border-gray-800">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-cyan-600 text-sm font-semibold text-white">
                    {{ author.name.charAt(0).toUpperCase() }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ author.name }}</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">@{{ author.username }}</p>
                </div>
            </div>

            <div
                class="prose prose-gray max-w-none dark:prose-invert prose-headings:font-semibold prose-a:text-cyan-600 prose-img:rounded-xl dark:prose-a:text-cyan-400"
                v-html="article.content"
            />

        </main>
        <AppFooter />
    </div>
</template>
