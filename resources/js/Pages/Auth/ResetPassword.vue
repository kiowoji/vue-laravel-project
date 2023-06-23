<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { useStore } from "vuex";
import { computed } from "vue";

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};
</script>

<template>
    <MainLayout>
        <Head title="Reset Password" />
        <div :class="['reset', { 'wide-view': isShowAside }]" class="mt-20 flex justify-center">
        <form @submit.prevent="submit" class="login-form bg-[color:var(--white)] p-8 rounded-lg w-2/5">
            <h3 class="text-[color:var(--black)] text-4xl capitalize font-semibold mb-4 text-center">Reset Password</h3>
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

            <div class="mt-5">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-2 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-5">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-2 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="text-2xl">
                    Reset Password
                </PrimaryButton>
            </div>
        </form>
        </div>
    </MainLayout>
</template>
