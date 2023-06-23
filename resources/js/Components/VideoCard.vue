<template>
    <a
        class="box bg-[color:var(--white)] relative p-8 rounded-lg"
        href="#"
    >
        <i
            class="fas fa-play absolute h-72 bg-[rgba(0,0,0,0.3)] flex items-center justify-center text-6xl text-white rounded-lg top-8 inset-x-8"
        ></i>
        <img
            class="w-full h-72 object-cover rounded-lg"
            :src="videoCard.thumbnail"
            alt=""
        />
        <h3
            class="text-3xl font-semibold text-[color:var(--black)] mt-6"
        >
            {{ videoCard.title }}
        </h3>
    </a>
</template>

<script setup>
import {defineProps} from "vue";


defineProps({
    videoCard: {
        type: Object,
        required: true,
        default: () => ({
            title: 'Complete HTML tutorial',
            thumbnail: '/assets/post-1-1.png',
            url: '#'
        })
    },
});

</script>

