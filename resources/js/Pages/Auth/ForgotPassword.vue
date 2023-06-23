<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { useStore } from "vuex";
import { computed } from "vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>

<template>
    <MainLayout>
        <Head title="Forgot Password" />
        <div :class="['forgot', { 'wide-view': isShowAside }]" class="mt-28 flex flex-col w-2/5 m-auto">
            <p class="mb-6 text-2xl text-[color:var(--black)]">
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </p>

            <div v-if="status" class="mb-4 font-medium text-2xl text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="login-form bg-[color:var(--white)] p-8 rounded-lg">
                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-2 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        class="text-2xl"
                    >
                        Email Password Reset Link
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </MainLayout>
</template>
