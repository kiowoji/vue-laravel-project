<template>
    <MainLayout v-cloak>
        <Head title="Favourite Courses" />
        <section :class="['courses', { 'wide-view': isShowAside }]">
            <h1 class="heading">Favourite Courses</h1>

            <div class="box-container grid gap-6 justify-center items-start">

                <CourseCard :key="course.id" v-for="course in courses" :courseCard="course"></CourseCard>

            </div>

        </section>
    </MainLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { useStore } from "vuex";
import MainLayout from "@/Layouts/MainLayout.vue";
import CourseCard from "@/Components/CourseCard.vue";

defineProps({
    courses: {
        type: Array,
        required: true,
    },
});

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit('toggleAside')
}
</script>

<style scoped>

</style>
