<template>
    <Modal :show="isShowVideoModal" @close="closeVideoModal">
        <iframe
            width="100%"
            height="300px"
            :src="getEmbedUrl(modalVideo.url)"
            title="YouTube video player"
            allowfullscreen
        ></iframe>
    </Modal>
</template>

<script setup>
import { useStore } from "vuex";
import { computed, ref, watch } from "vue";
import Modal from "@/Components/Modal.vue";

const store = useStore();

const modalVideo = computed(() => store.state.modalVideo);
const isShowVideoModal = computed(() => store.state.isShowVideoModal);

const closeVideoModal = () => {
    store.commit("closeVideoModal");
};

const getEmbedUrl =(url) => {
    const videoId = url.split("v=")[1];
    return `https://www.youtube.com/embed/${videoId}`;
}

</script>
