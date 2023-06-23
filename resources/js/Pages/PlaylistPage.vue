<template>
    <MainLayout>
        <Head title="Course Playlist" />
        <PlaylistCard :key="course.id" :playlistCard="course" :favourite-courses="favouriteCourses"></PlaylistCard>

        <section :class="['playlist-videos', { 'wide-view': isShowAside }]">
            <h1 class="heading">Course Videos</h1>

            <div class="box-container grid gap-6 justify-center items-start">
                <VideoCard
                    :key="video.id"
                    v-for="video in course.videos"
                    :video-card="video"
                    @click.prevent="openDialog(video)"
                ></VideoCard>
            </div>
        </section>

    </MainLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { useStore } from "vuex";
import MainLayout from "@/Layouts/MainLayout.vue";
import PlaylistCard from "@/Components/PlaylistCard.vue";
import VideoCard from "@/Components/VideoCard.vue";
import Modal from "@/Components/Modal.vue";


defineProps({
    course: {
        type: Object,
        required: true,
    },
    favouriteCourses: {
        type: Array,
        required: true,
    },
});

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);


const toggleAside = () => {
    store.commit("toggleAside");
};

const openVideoModal = () => {
    store.commit("showVideoModal");
};

const setModalVideo = (video) => {
    store.commit("setModalVideo", video);
};

const openDialog = (video) => {
    setModalVideo(video);
    openVideoModal();
};
</script>

<style>
.playlist-details .row .column {
    flex: 1 1 40rem;
}

.playlist-videos .box-container {
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
}

.playlist-videos .box-container .box i {
    display: none;
}

.playlist-videos .box-container .box:hover i {
    display: flex;
}

.playlist-videos .box-container .box:hover h3 {
    color: var(--main-color);
}
</style>
