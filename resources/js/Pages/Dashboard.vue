<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import { useStore } from "vuex";
import { computed } from "vue";

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>

<template>
    <Head title="Dashboard" />
    <MainLayout>
        <AuthenticatedLayout>
            <div class="w-[90%] mx-auto">
                <div
                    class="bg-[color:var(--white)] overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-[color:var(--black)] text-2xl">
                        You're logged in!
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </MainLayout>
</template>
