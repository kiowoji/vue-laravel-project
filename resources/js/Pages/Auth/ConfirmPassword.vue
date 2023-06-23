<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link, useForm} from '@inertiajs/vue3';
import { useStore } from "vuex";
import { computed } from 'vue';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
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
        <Head title="Confirm Password" />
        <div :class="['confirm', { 'wide-view': isShowAside }]" class="mt-28 flex flex-col w-2/5 m-auto">
        <div class="mb-6 text-2xl text-[color:var(--black)]">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit" class="login-form bg-[color:var(--white)] p-8 rounded-lg">
            <div>
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <PrimaryButton class="ml-4 text-2xl" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </PrimaryButton>
            </div>
        </form>
        </div>
    </MainLayout>
</template>
