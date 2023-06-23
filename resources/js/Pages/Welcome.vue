<script setup>
import { Head, Link } from "@inertiajs/vue3";
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

<template>
    <MainLayout>
        <Head title="Welcome" />

        <div>

        <section :class="['home-grid', { 'wide-view': isShowAside }]">
            <h1 class="heading">popular topics</h1>

            <div class="box-container">
                <div class="box bg-[color:var(--white)] p-8 rounded-lg">
                    <div class="flex flex-wrap gap-6">
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-html5 mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >HTML</span
                            ></a
                        >
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-css3 mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >CSS</span
                            ></a
                        >
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-js mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >javascript</span
                            ></a
                        >
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-react mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >react</span
                            ></a
                        >
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-php mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >PHP</span
                            ></a
                        >
                        <a
                            href="#"
                            class="bg-[color:var(--light-bg)] py-4 px-6 text-2xl rounded-lg"
                            ><i
                                class="fab fa-bootstrap mr-4 text-[color:var(--black)]"
                            ></i
                            ><span class="text-[color:var(--light-color)]"
                                >bootstrap</span
                            ></a
                        >
                    </div>
                </div>
            </div>
        </section>

        <section :class="['courses', { 'wide-view': isShowAside }]">
            <h1 class="heading">our courses</h1>

            <div class="box-container grid gap-8 justify-center items-start">
                <CourseCard
                    :key="course.id"
                    v-for="course in courses"
                    :courseCard="course"
                ></CourseCard>
            </div>

            <div class="text-center mt-8">
                <Link :href="route('courses')" class="inline-option-btn"
                    >view all courses</Link
                >
            </div>
        </section>

    </div>
    </MainLayout>
</template>

<style>
.home-grid .box-container .flex a:hover {
    background-color: var(--black);
}

.home-grid .box-container .flex a:hover span {
    color: var(--white);
}

.home-grid .box-container .flex a:hover i {
    color: var(--white);
}

</style>
