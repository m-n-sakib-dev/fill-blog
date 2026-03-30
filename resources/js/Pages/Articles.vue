<script setup>

import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';

defineProps({
    articles: {
        type: Object,
        required: true,
    },
});

function stripHtml(html) {
    const div = document.createElement('div');
    div.innerHTML = html;
    return div.textContent || div.innerText || '';
}

function excerpt(html, length = 100) {
    const text = stripHtml(html);
    return text.length > length ? text.slice(0, length).trimEnd() + '…' : text;
}
</script>

<template>

    <Head title="Articles" />

    <div class="min-h-screen bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
        <Navbar />

        <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Articles</h1>
                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    {{ articles.total }} article{{ articles.total !== 1 ? 's' : '' }} published
                </p>
            </div>

            <div v-if="articles.data.length === 0" class="flex flex-col items-center justify-center py-24 text-center">
                <p class="text-gray-400 dark:text-gray-600">No articles yet.</p>
            </div>

            <div v-else class="grid gap-6 sm:grid-cols-2">

                <Link
                    v-for="article in articles.data.filter(a => a.user?.sub_domain)"
                    :key="article.id"
                    :href="route('user.article', { sub_domain: article.user.sub_domain, id: article.id })"
                    class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700">
                    <div class="px-6 pt-5">
                        <span
                            v-if="article.category"
                            class="inline-block rounded-full bg-cyan-50 px-3 py-0.5 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                            {{ article.category.name }}
                        </span>
                    </div>

                    <div class="flex flex-1 flex-col gap-2 px-6 py-4">
                        <h2 class="line-clamp-2 text-base font-semibold leading-snug text-gray-900 dark:text-white">
                            {{ article.title }}
                        </h2>
                        <p class="line-clamp-3 flex-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            {{ excerpt(article.content) }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-50 px-6 py-3 dark:border-gray-800">
                        <span class="text-xs text-gray-400 dark:text-gray-500">
                            by {{ article.user.name }}
                        </span>
                        <time class="text-xs text-gray-400 dark:text-gray-500">
                            {{
                                new Date(article.created_at).toLocaleDateString('en-GB', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric',
                                })
                            }}
                        </time>
                    </div>
                </Link>
            </div>
            <div
                v-if="articles.last_page > 1"
                class="mt-12 flex items-center justify-center gap-2">
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
                    ]" />
            </div>

        </div>
    </div>
</template>
