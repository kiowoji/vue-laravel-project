<template>
    <MainLayout v-cloak>
        <Head title="Courses" />
        <section :class="['courses', { 'wide-view': isShowAside }]">
            <h1 class="heading">our courses</h1>

            <div class="box-container grid gap-8 justify-center items-start">

                <CourseCard :key="course.id" v-for="course in courses" :courseCard="course"></CourseCard>

            </div>

        </section>
    </MainLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { createApp, onMounted, ref } from "vue";
import { computed } from "vue";
import { useStore } from "vuex";
import MainLayout from "@/Layouts/MainLayout.vue";
import CourseCard from "@/Components/CourseCard.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
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
