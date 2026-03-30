<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import HomeFeed from '@/Components/HomeFeed.vue';
import AppFooter from '@/Components/AppFooter.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    feed:       { type: Array, default: () => [] },
    categories: { type: Array, default: () => [] },
});

const authUser = usePage().props.auth?.user ?? null;
</script>

<template>

    <Head title="Welcome" />

    <div class="min-h-screen bg-white dark:bg-gray-950 transition-colors duration-300">

        <Navbar />

        <!-- Logged-in: show personalized feed -->
        <HomeFeed v-if="authUser" :feed="feed" :categories="categories" />

        <!-- Logged-out: show landing page -->
        <template v-else>
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute -top-32 left-1/2 -translate-x-1/2">
                <div class="h-[600px] w-[600px] rounded-full bg-cyan-100/60 blur-3xl dark:bg-cyan-900/20" />
            </div>

            <div class="relative mx-auto max-w-4xl px-4 py-24 text-center sm:px-6 sm:py-32 lg:px-8">
                <span class="mb-4 inline-block rounded-full bg-cyan-50 px-4 py-1 text-sm font-medium text-cyan-700 dark:bg-cyan-900/40 dark:text-cyan-300">
                    ✦ A place for great stories
                </span>
                <h1 class="mt-4 text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
                    Discover & Share
                    <span class="text-cyan-600 dark:text-cyan-400">Amazing Stories</span>
                </h1>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-gray-500 dark:text-gray-400">
                    MyBlog is a platform where writers share their ideas, stories, and knowledge with the world.
                    Each writer gets their own personal space.
                </p>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                    <a
                        href="/app/articles/create"
                        class="rounded-xl bg-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 transition">
                        Start Writing — It's Free
                    </a>
                    <a
                        href="/app/login"
                        class="rounded-xl border border-gray-200 bg-white px-6 py-3 text-sm font-semibold text-gray-700 hover:border-cyan-400 hover:text-cyan-600 transition dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-cyan-500 dark:hover:text-cyan-400">
                        Sign In
                    </a>
                </div>
            </div>
        </section>

        <section class="border-y border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
            <div class="mx-auto grid max-w-4xl grid-cols-3 divide-x divide-gray-100 dark:divide-gray-800">
                <div class="px-6 py-8 text-center">
                    <p class="text-3xl font-bold text-cyan-600 dark:text-cyan-400">100+</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Articles Published</p>
                </div>
                <div class="px-6 py-8 text-center">
                    <p class="text-3xl font-bold text-cyan-600 dark:text-cyan-400">50+</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Writers</p>
                </div>
                <div class="px-6 py-8 text-center">
                    <p class="text-3xl font-bold text-cyan-600 dark:text-cyan-400">10+</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Categories</p>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="mb-14 text-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">Why MyBlog?</h2>
                <p class="mt-3 text-gray-500 dark:text-gray-400">Everything you need to share your voice with the world.</p>
            </div>

            <div class="grid gap-8 sm:grid-cols-3">
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                        <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Rich Editor</h3>
                    <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        Write beautiful articles with our powerful rich text editor. Format, style, and express your ideas freely.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                        <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Personal URL</h3>
                    <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        Every writer gets a unique personal blog URL. Share your space and build your own audience.
                    </p>
                </div>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                        <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Categories</h3>
                    <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        Organise your articles into categories so readers can easily find what they love.
                    </p>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
                <div class="mb-14 text-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">Get Started in Minutes</h2>
                </div>
                <div class="grid gap-6 sm:grid-cols-3">
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-cyan-600 text-lg font-bold text-white">1</div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Create an Account</h4>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sign up for free and set your unique username.</p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-cyan-600 text-lg font-bold text-white">2</div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Write Your First Article</h4>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Use the admin panel to write and publish articles.</p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-cyan-600 text-lg font-bold text-white">3</div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Share Your Blog</h4>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Share your personal blog URL with the world.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-3xl px-4 py-24 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">
                Ready to start your blog?
            </h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400">Join writers who are already sharing their stories on MyBlog.</p>
            <a
                href="/app/articles/create"
                class="mt-8 inline-block rounded-xl bg-cyan-600 px-8 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 transition">
                Create Your Free Blog
            </a>
        </section>

        </template>

        <AppFooter />

    </div>
</template>
