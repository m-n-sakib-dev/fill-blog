<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
    feed:       { type: Array,  required: true },
    categories: { type: Array,  default: () => [] },
});

const user = usePage().props.auth.user;

function stripHtml(html) {
    const div = document.createElement('div');
    div.innerHTML = html;
    return div.textContent || div.innerText || '';
}

function excerpt(html, length = 110) {
    const text = stripHtml(html);
    return text.length > length ? text.slice(0, length).trimEnd() + '…' : text;
}

function formatDate(date) {
    return new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}
</script>

<template>
    <div>

        <!-- ─── Hero ─── -->
        <section class="relative isolate overflow-hidden">
            <!-- Background image -->
            <div class="absolute inset-0 -z-10">
                <img
                    src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=1600&q=80"
                    alt=""
                    class="h-full w-full object-cover object-center"
                />
                <div class="absolute inset-0 bg-gray-950/65 dark:bg-gray-950/80" />
            </div>

            <div class="mx-auto max-w-5xl px-4 py-24 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <span class="inline-block rounded-full border border-white/20 bg-white/10 px-4 py-1 text-sm font-medium text-white backdrop-blur-sm">
                        Welcome back, {{ user.name.split(' ')[0] }} 👋
                    </span>
                    <h1 class="mt-5 text-4xl font-bold leading-tight text-white sm:text-5xl">
                        Your stories<br/>
                        <span class="text-cyan-400">start here.</span>
                    </h1>
                    <p class="mt-4 text-base leading-relaxed text-gray-300">
                        Explore the latest articles from writers on Fill Blog, browse by category, or start writing your own story today.
                    </p>

                    <!-- No username warning -->
                    <div
                        v-if="!user.sub_domain"
                        class="mt-6 flex items-start gap-3 rounded-xl border border-amber-400/30 bg-amber-400/10 p-4 backdrop-blur-sm">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-amber-300">Username not set</p>
                            <p class="mt-0.5 text-xs text-amber-400/80">Set a username (min 5 chars) from your profile to activate your blog and start writing.</p>
                            <a href="/app" class="mt-1.5 inline-block text-xs font-semibold text-amber-300 underline underline-offset-2">
                                Go to Profile →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── Categories ─── -->
        <section v-if="categories.length" class="border-b border-gray-100 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 mr-2">Browse:</span>
                    <Link
                        v-for="cat in categories"
                        :key="cat.id"
                        :href="route('articles')"
                        class="rounded-full border border-gray-200 bg-gray-50 px-3.5 py-1 text-sm text-gray-600 transition hover:border-cyan-400 hover:bg-cyan-50 hover:text-cyan-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:border-cyan-500 dark:hover:bg-cyan-900/20 dark:hover:text-cyan-300">
                        {{ cat.name }}
                        <span class="ml-1 text-xs text-gray-400 dark:text-gray-600">{{ cat.articles_count }}</span>
                    </Link>
                </div>
            </div>
        </section>

        <!-- ─── Latest Articles ─── -->
        <section class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Latest Articles</h2>
                <Link :href="route('articles')" class="text-sm text-cyan-600 hover:underline dark:text-cyan-400">
                    View all →
                </Link>
            </div>

            <div v-if="feed.length === 0" class="rounded-2xl border border-dashed border-gray-200 py-20 text-center dark:border-gray-700">
                <p class="text-sm text-gray-400 dark:text-gray-600">No articles yet. Be the first to publish!</p>
                <a href="/app/articles/create" class="mt-3 inline-block text-sm font-semibold text-cyan-600 hover:underline dark:text-cyan-400">
                    Write an article →
                </a>
            </div>

            <div v-else class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <Link
                    v-for="article in feed.filter(a => a.user?.sub_domain)"
                    :key="article.id"
                    :href="route('user.article', { sub_domain: article.user.sub_domain, id: article.id })"
                    class="group flex flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700">

                    <!-- Top accent bar by category color -->
                    <div class="h-1 w-full bg-cyan-500" />

                    <div class="flex flex-1 flex-col p-5">
                        <div class="mb-3 flex items-center justify-between">
                            <span
                                v-if="article.category"
                                class="rounded-full bg-cyan-50 px-2.5 py-0.5 text-xs font-medium text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                                {{ article.category.name }}
                            </span>
                            <time class="text-xs text-gray-400 dark:text-gray-500">
                                {{ formatDate(article.created_at) }}
                            </time>
                        </div>

                        <h3 class="mb-2 line-clamp-2 text-base font-semibold leading-snug text-gray-900 group-hover:text-cyan-600 transition dark:text-white dark:group-hover:text-cyan-400">
                            {{ article.title }}
                        </h3>
                        <p class="line-clamp-3 flex-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            {{ excerpt(article.content) }}
                        </p>
                    </div>

                    <div class="flex items-center gap-2.5 border-t border-gray-50 px-5 py-3 dark:border-gray-800">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-xs font-bold text-white">
                            {{ article.user.name.charAt(0).toUpperCase() }}
                        </div>
                        <span class="truncate text-xs text-gray-500 dark:text-gray-400">{{ article.user.name }}</span>
                    </div>
                </Link>
            </div>
        </section>

        <!-- ─── Explore more ─── -->
        <section class="border-t border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
            <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
                <div class="grid gap-4 sm:grid-cols-2">

                    <Link
                        :href="route('authors')"
                        class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 transition hover:border-cyan-300 hover:shadow-sm dark:border-gray-800 dark:bg-gray-900/50 dark:hover:border-cyan-700">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Discover Authors</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Browse all writers on Fill Blog</p>
                        </div>
                        <svg class="ml-auto h-4 w-4 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>

                    <Link
                        v-if="user.sub_domain"
                        :href="route('user.blog', { sub_domain: user.sub_domain })"
                        class="flex items-center gap-4 rounded-2xl border border-gray-100 bg-white p-5 transition hover:border-cyan-300 hover:shadow-sm dark:border-gray-800 dark:bg-gray-900/50 dark:hover:border-cyan-700">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">My Blog</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">View your public blog page</p>
                        </div>
                        <svg class="ml-auto h-4 w-4 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>

                    <a
                        v-else
                        href="/app"
                        class="flex items-center gap-4 rounded-2xl border border-dashed border-gray-200 bg-white p-5 transition hover:border-cyan-300 dark:border-gray-700 dark:bg-gray-900/50">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-50 dark:bg-gray-800">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white">Activate My Blog</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Set a username to go live</p>
                        </div>
                        <svg class="ml-auto h-4 w-4 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                </div>
            </div>
        </section>

    </div>
</template>
