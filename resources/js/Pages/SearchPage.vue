<template>
    <MainLayout v-cloak>
        <Head title="Search" />
        <div class="m-7" :class="['search', { 'wide-view': isShowAside }]">
            <h1 class="heading">Search courses you like</h1>
            <hr />
            <Search></Search>
            <div v-if="courses.length">
                <h2 class="text-2xl font-bold text-[color:var(--black)] my-6 ml-1">
                    {{ courses.length }} result found
                </h2>

                <div
                    class="box-container flex flex-row flex-wrap gap-7 justify-start"
                >
                    <CourseCard
                        :key="course.id"
                        v-for="course in courses"
                        :courseCard="course"
                    ></CourseCard>
                </div>
            </div>
            <div v-else>
                <p>No courses found</p>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { computed } from "vue";
import { useStore } from "vuex";
import MainLayout from "@/Layouts/MainLayout.vue";
import Search from "@/Components/Search.vue";
import CourseCard from "@/Components/CourseCard.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    courses: {
        type: Array,
        required: true,
    },
});

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>
