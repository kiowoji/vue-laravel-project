<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { useStore } from "vuex";
import { computed } from "vue";

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>

<template>
    <MainLayout>
        <Head title="Email Verification" />
        <div :class="['verify', { 'wide-view': isShowAside }]" class="mt-28 flex flex-col w-2/5 m-auto">
        <div class="mb-6 text-2xl text-[color:var(--black)]">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
            we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div class="mb-6 text-2xl text-[color:var(--main-color)]" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you provided during registration.
        </div>

        <form @submit.prevent="submit" class="login-form bg-[color:var(--white)] p-8 rounded-lg">
            <div class="mt-4 flex items-center justify-between">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="text-2xl">
                    Resend Verification Email
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="underline text-2xl text-[color:var(--black)] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >Log Out</Link
                >
            </div>
        </form>
        </div>
    </MainLayout>
</template>
