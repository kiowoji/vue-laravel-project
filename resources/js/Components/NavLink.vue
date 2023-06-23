<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center pt-3 border-b-2 border-transparent text-4xl font-semibold text-[color:var(--black)] hover:text-[color:var(--main-color)] transition duration-150 ease-in-out'
        : 'inline-flex items-center pt-3 border-b-2 border-transparent text-4xl font-semibold text-[color:var(--black)] hover:text-[color:var(--main-color)] transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
