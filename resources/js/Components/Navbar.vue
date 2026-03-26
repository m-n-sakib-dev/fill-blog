<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link, usePage, router } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { useDarkMode } from '@/composables/useDarkMode';

const page = usePage();
const user = page.props.auth?.user ?? null;
const { isDark, toggle } = useDarkMode();


const currentUrl = page.url;

const open = ref(false);

function logout() {
    router.post('/logout');
}

function closeOnEscape(e) {
    if (open.value && e.key === 'Escape') open.value = false;
}
onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));
</script>

<template>
    <nav class="sticky top-0 z-20 border-b border-gray-100 bg-white/90 backdrop-blur dark:border-gray-800 dark:bg-gray-900/90">
        <div class="mx-auto flex h-14 max-w-5xl items-center justify-between px-4 sm:px-6 lg:px-8">

            <Link href="/" class="flex items-center gap-2">
                <ApplicationLogo class="h-7 w-auto fill-current text-gray-800 dark:text-white" />
                <span class="hidden text-2xl font-semibold text-gray-800 dark:text-white sm:block">Fill Blog</span>
            </Link>

            <div class="hidden items-center gap-1 sm:flex">
                <Link
                    :href="route('articles')"
                    :class="[
                        'rounded-lg px-3 py-1.5 text-sm font-medium transition',
                        currentUrl.startsWith('/articles')
                            ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white',
                    ]">
                    Articles
                </Link>
                <Link
                    :href="route('authors')"
                    :class="[
                        'rounded-lg px-3 py-1.5 text-sm font-medium transition',
                        currentUrl.startsWith('/authors')
                            ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300'
                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white',
                    ]">
                    Authors
                </Link>
            </div>

            <div class="relative">

                <button
                    @click="open = !open"
                    class="flex items-center justify-center rounded-full transition focus:outline-none"
                    aria-label="User menu">
                    <span
                        v-if="user"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-cyan-600 text-sm font-semibold text-white shadow-sm">
                        {{ user.name.charAt(0).toUpperCase() }}
                    </span>
                    <span
                        v-else
                        class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 hover:border-cyan-400 hover:text-cyan-600 transition dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-cyan-500 dark:hover:text-cyan-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                </button>

                <div v-if="open" class="fixed inset-0 z-40" @click="open = false" />

                <Transition
                    enter-active-class="transition ease-out duration-150"
                    enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-95">
                    <div
                        v-if="open"
                        class="absolute right-0 z-50 mt-2 w-52 origin-top-right rounded-xl border border-gray-100 bg-white py-1 shadow-lg dark:border-gray-700 dark:bg-gray-800">
                        <template v-if="user">
                            <div class="border-b border-gray-100 px-4 py-2.5 dark:border-gray-700">
                                <p class="truncate text-xs font-medium text-gray-800 dark:text-gray-100">{{ user.name }}</p>
                                <p class="truncate text-xs text-gray-400 dark:text-gray-500">{{ user.email }}</p>
                            </div>
                            <a
                                href="/app"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-cyan-600 transition dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-cyan-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                My Profile
                            </a>
                            <button
                                @click="logout"
                                class="flex w-full items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition dark:text-red-400 dark:hover:bg-red-900/20">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </template>

                        <template v-else>
                            <a
                                href="/app/login"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-cyan-600 transition dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-cyan-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Login
                            </a>
                        </template>

                        <div class="my-1 border-t border-gray-100 dark:border-gray-700" />

                        <button @click="toggle(); open = false" class="flex w-full items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition dark:text-gray-300 dark:hover:bg-gray-700">
                            <svg v-if="isDark" class="h-4 w-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                            <svg v-else class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            {{ isDark ? 'Light Mode' : 'Dark Mode' }}
                        </button>

                    </div>
                </Transition>
            </div>

        </div>
    </nav>
</template>
