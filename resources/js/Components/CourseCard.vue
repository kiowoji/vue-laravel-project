<template>
    <div class="box bg-[color:var(--white)] rounded-xl p-8 max-w-3xl">
        <div class="tutor flex items-center gap-6 mb-10">
            <img
                class="h-20 w-20 object-cover rounded-full"
                src="/assets/avatar-pic.png"
                alt=""
            />
            <div class="info">
                <h3 class="text-3xl font-bold mb-1 text-[color:var(--black)]">
                    {{ courseCard.author }}
                </h3>
                <span class="text-xl text-[color:var(--light-color)]">{{
                    courseCard.date
                }}</span>
            </div>
        </div>
        <div class="thumb relative">
            <img
                class="w-full h-64 object-cover rounded-xl"
                :src="courseCard.image"
                alt=""
            />
        </div>
        <h3
            class="title text-3xl font-bold pb-2 pt-4 text-[color:var(--black)]"
        >
            {{ courseCard.title }}
        </h3>
        <Link
            :href="route('courses.view.course', courseCard.id)"
            class="inline-btn w-full"
            >view playlist
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    courseCard: {
        type: Object,
        required: true,
        default: () => ({
            title: "Complete HTML tutorial",
            author: "john deo",
            date: "21-10-2022",
            image: "/assets/course-html.png",
        }),
    },
});
</script>
