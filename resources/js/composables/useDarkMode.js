import { ref, watch } from 'vue';

const isDark = ref(
    localStorage.getItem('theme') === 'dark' ||
    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
);

function applyTheme(dark) {
    if (dark) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

applyTheme(isDark.value);

watch(isDark, (val) => {
    applyTheme(val);
    localStorage.setItem('theme', val ? 'dark' : 'light');
});

export function useDarkMode() {
    function toggle() {
        isDark.value = !isDark.value;
    }

    return { isDark, toggle };
}
