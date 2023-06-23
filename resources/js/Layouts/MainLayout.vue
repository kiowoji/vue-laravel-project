<script setup>
import { computed } from "vue";
import { useStore } from "vuex";
import AppHeader from "@/Components/AppHeader.vue";
import AppSidebar from "@/Components/AppSidebar.vue";
import AppFooter from "@/Components/AppFooter.vue";
import VideoDialog from "@/Components/VideoDialog.vue";

const store = useStore();
const isNightModeActive = computed(() => store.state.isNightModeActive);

const toggleNightMode = () => {
    store.commit("toggleNightMode");
};
</script>

<template>
    <div>
        <!-- Page Content -->
        <main id="main-section" :class="{ 'dark dark-bg': isNightModeActive }">
            <AppHeader></AppHeader>
            <AppSidebar></AppSidebar>
            <slot />
            <AppFooter />
        </main>

        <VideoDialog></VideoDialog>
    </div>
</template>
