<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    article: {
        type: Object,
        required: true,
    },
    subDomain: {
        type: String,
        required: true,
    },
});

function stripHtml(html) {
    const div = document.createElement('div');
    div.innerHTML = html;
    return div.textContent || div.innerText || '';
}

function excerpt(html, length = 120) {
    const text = stripHtml(html);
    return text.length > length ? text.slice(0, length).trimEnd() + '…' : text;
}
</script>

<template>
    <Link :href="route('user.article', { sub_domain: subDomain, id: article.id })">
        <article
            class="flex h-full flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700"
        >
            <div class="px-6 pt-5">
                <span
                    v-if="article.category"
                    class="inline-block rounded-full bg-cyan-50 px-3 py-0.5 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300"
                >
                    {{ article.category.name }}
                </span>
            </div>

            <div class="flex flex-1 flex-col gap-3 px-6 py-4">
                <h2 class="line-clamp-2 text-lg font-semibold leading-snug text-gray-900 dark:text-white">
                    {{ article.title }}
                </h2>
                <p class="line-clamp-4 flex-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ excerpt(article.content) }}
                </p>
            </div>

            <div class="flex items-center justify-between border-t border-gray-50 px-6 py-3 dark:border-gray-800">
                <time class="text-xs text-gray-400 dark:text-gray-500">
                    {{
                        new Date(article.created_at).toLocaleDateString('en-GB', {
                            day: 'numeric',
                            month: 'short',
                            year: 'numeric',
                        })
                    }}
                </time>
                <span class="text-xs font-medium text-cyan-600 dark:text-cyan-400">Read more →</span>
            </div>
        </article>
    </Link>
</template>
