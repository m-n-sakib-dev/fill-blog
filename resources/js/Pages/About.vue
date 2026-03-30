<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue';
import AppFooter from '@/Components/AppFooter.vue';
</script>

<template>
    <Head title="About — Fill Blog" />

    <div class="flex min-h-screen flex-col bg-white dark:bg-gray-950 transition-colors duration-300">
        <Navbar />

        <main class="flex-1">

            <!-- Hero -->
            <section class="border-b border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                <div class="mx-auto max-w-3xl px-4 py-16 text-center sm:px-6 lg:px-8">
                    <span class="mb-3 inline-block rounded-full bg-cyan-50 px-4 py-1 text-sm font-medium text-cyan-700 dark:bg-cyan-900/40 dark:text-cyan-300">
                        About Fill Blog
                    </span>
                    <h1 class="mt-3 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">
                        A home for every writer's voice
                    </h1>
                    <p class="mx-auto mt-4 max-w-xl text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Fill Blog is an open blogging platform built with Laravel, Filament, and Vue 3.
                        Every registered user gets their own personal blog space with a unique URL.
                    </p>
                </div>
            </section>

            <!-- Features -->
            <section class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
                <h2 class="mb-10 text-center text-2xl font-bold text-gray-900 dark:text-white">What Fill Blog offers</h2>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Personal Blog URL</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Every writer gets a unique URL like <code class="rounded bg-gray-100 px-1 dark:bg-gray-800">fillblog.com/your-name</code>. Set your username once and your blog goes live instantly.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Rich Text Editor</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Write beautifully formatted articles using the built-in rich text editor. Add headings, lists, links, images, and more with ease.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Categories</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Organise your articles by category so readers can discover content by topic. Categories are managed by admins to keep things consistent.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Dark Mode</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Full dark and light mode support across the entire platform. Toggle from the profile menu — your preference is remembered across sessions.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Role-based Access</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Admins manage the platform. Writers publish their own content. Roles are assigned automatically when you set your username.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-white p-6 dark:border-gray-800 dark:bg-gray-900">
                        <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-xl bg-cyan-50 dark:bg-cyan-900/30">
                            <svg class="h-5 w-5 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">Public Feed</h3>
                        <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                            Browse all articles and discover all authors from the public feed — no login required. Great for readers who just want to explore.
                        </p>
                    </div>

                </div>
            </section>

            <!-- How to use -->
            <section class="border-t border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
                    <h2 class="mb-10 text-center text-2xl font-bold text-gray-900 dark:text-white">How to get started</h2>

                    <div class="space-y-6">

                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-sm font-bold text-white">1</div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Create an account</h4>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Click <strong>Register</strong> and fill in your name, email, and password. You'll be logged in immediately.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-sm font-bold text-white">2</div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Set your username</h4>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Go to <strong>Dashboard → Profile</strong>, set a username (minimum 5 characters). This activates your personal blog URL and unlocks article creation.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-sm font-bold text-white">3</div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Write your first article</h4>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Go to <strong>Dashboard → Articles → New Article</strong>. Give it a title, choose a category, and write your content using the rich editor. Save and it's live instantly.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-cyan-600 text-sm font-bold text-white">4</div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Share your blog</h4>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Your personal blog is at <code class="rounded bg-gray-100 px-1 dark:bg-gray-800">fillblog.com/your-username</code>. Share the link with anyone — no login needed to read your articles.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="mt-10 text-center">
                        <a href="/register" class="inline-block rounded-xl bg-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 transition">
                            Get Started — It's Free
                        </a>
                    </div>
                </div>
            </section>

        </main>

        <AppFooter />
    </div>
</template>
