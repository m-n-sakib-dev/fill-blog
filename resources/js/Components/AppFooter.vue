<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <footer class="mt-auto border-t border-gray-100 bg-white dark:border-gray-800 dark:bg-gray-900">
        <div class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8">

            <div class="grid gap-10 sm:grid-cols-3">

                <!-- Brand -->
                <div class="col-span-1">
                    <Link href="/" class="flex items-center gap-2">
                        <ApplicationLogo class="h-7 w-auto fill-current text-gray-800 dark:text-white" />
                        <span class="text-lg font-bold text-gray-800 dark:text-white">Fill Blog</span>
                    </Link>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        A platform where writers share their ideas, stories, and knowledge with the world.
                        Every writer gets their own personal space.
                    </p>
                </div>

                <!-- Explore -->
                <div>
                    <h4 class="mb-4 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Explore</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <Link :href="route('articles')" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Articles
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('authors')" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Authors
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('about')" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                About
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Account -->
                <div>
                    <h4 class="mb-4 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Account</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="/app" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/app/articles/create" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Write an Article
                            </a>
                        </li>
                        <li>
                            <a href="/app/login" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Sign In
                            </a>
                        </li>
                        <li>
                            <a href="/register" class="text-sm text-gray-600 hover:text-cyan-600 transition dark:text-gray-400 dark:hover:text-cyan-400">
                                Register
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom bar -->
            <div class="mt-10 flex flex-col items-center justify-between gap-3 border-t border-gray-100 pt-6 sm:flex-row dark:border-gray-800">
                <p class="text-xs text-gray-400 dark:text-gray-600">
                    © {{ new Date().getFullYear() }} Fill Blog · Built by M.N.Sakib
                </p>
                <p class="text-xs text-gray-400 dark:text-gray-600">
                    Powered by Laravel · Filament · Vue 3
                </p>
            </div>

        </div>
    </footer>
</template>
