<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
import { useStore } from "vuex";
import { computed } from "vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const {props} = usePage();
const isAdmin = props.auth.user.is_admin;

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>

<template>
    <Head title="Profile" />
    <MainLayout>
        <AuthenticatedLayout>
           
                <div class="w-[90%] mx-auto">
                    <div class="space-y-3">
                        <h2
                            class="font-semibold text-3xl text-[color:var(--black)]"
                        >
                            Profile
                        </h2>
                        <div>
                            <Link
                                class="inline-btn text-2xl"
                                :href="route('courses.favourite.show')"
                                >Favourite courses</Link
                            >
                        </div>
                        <div class="py-6" v-if="isAdmin">
                            <Link
                                :href="route('course-upload')"
                                class="option-btn transition ease-in-out duration-150"
                            >
                                Upload New Course
                            </Link>
                        </div>
                        <div
                            class="p-4 bg-[color:var(--white)] shadow sm:rounded-lg"
                        >
                            <UpdateProfileInformationForm
                                :must-verify-email="mustVerifyEmail"
                                :status="status"
                                class="max-w-2xl"
                            />
                        </div>

                        <div
                            class="p-4 bg-[color:var(--white)] shadow sm:rounded-lg"
                        >
                            <UpdatePasswordForm class="max-w-2xl" />
                        </div>

                        <div
                            class="p-4 bg-[color:var(--white)] shadow sm:rounded-lg"
                        >
                            <DeleteUserForm class="max-w-2xl" />
                        </div>
                    </div>
                </div>
          
        </AuthenticatedLayout>
    </MainLayout>
</template>
