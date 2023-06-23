<template>
    <MainLayout v-cloak>
    <Head title="Contact Us" />
    <section :class="['contact', { 'wide-view': isShowAside }]">

        <div class="row flex items-center gap-6">

            <div class="image w-auto flex-[1_1_20rem] h-auto">
                <img src="/assets/contacts-pic.png" alt="">
            </div>

            <form action="#" method="post" @submit.prevent="sendContact" class="flex-[1_1_20rem] bg-[color:var(--white)] text-center p-8 rounded-lg sm:w-[90%] md:w-[70%]">
                <h3 class="capitalize text-[color:var(--black)] text-4xl mb-4">get in touch</h3>

                <input type="text" placeholder="enter your name" name="name" ref="nameInput" v-model="form.name" required maxlength="50" class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-3 p-4 rounded-lg">
                <InputError :message="form.errors.name" class="mt-2" />
                <input type="email" placeholder="enter your email" name="email" ref="emailInput" v-model="form.email" required maxlength="50" class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-3 p-4 rounded-lg">
                <InputError :message="form.errors.email" class="mt-2" />
                <input type="phone" placeholder="enter your number" name="phone" ref="phoneInput" v-model="form.phone" required maxlength="50" class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-3 p-4 rounded-lg">
                <InputError :message="form.errors.phone" class="mt-2" />
                <textarea name="message" class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-3 p-4 rounded-lg h-40 resize-none" placeholder="enter your message" ref="messageInput" v-model="form.message" required maxlength="1000" cols="30"
                    rows="10"></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <input id="contact-btn" type="submit" value="send message" class="inline-btn" name="submit">
            </form>

        </div>

        <div class="box-container grid gap-6 justify-center mt-9">

            <div class="box text-center bg-[color:var(--white)] p-8 rounded-lg">
                <i class="fas fa-phone text-5xl text-[color:var(--main-color)] mb-4"></i>
                <h3 class="text-3xl text-[color:var(--black)] mx-0 my-4">phone number</h3>
                <a href="tel:1234567890" class="block text-3xl text-[color:var(--light-color)] pt-2 hover:text-[color:var(--black)]">111-222-3333</a>
                <a href="tel:1112223333" class="block text-3xl text-[color:var(--light-color)] pt-2 hover:text-[color:var(--black)]">111-222-3333</a>
            </div>

            <div class="box text-center bg-[color:var(--white)] p-8 rounded-lg">
                <i class="fas fa-envelope text-5xl text-[color:var(--main-color)] mb-4"></i>
                <h3 class="text-3xl text-[color:var(--black)] mx-0 my-4">email address</h3>
                <a href="mailto:iramurzak@gmail.com" class="block text-3xl text-[color:var(--light-color)] pt-2 hover:text-[color:var(--black)]">iramurzak@gmail.com</a>
                <a href="mailto:iramurzak@gmail.com" class="block text-3xl text-[color:var(--light-color)] pt-2 hover:text-[color:var(--black)]">iramurzak@gmail.com</a>
            </div>

            <div class="box text-center bg-[color:var(--white)] p-8 rounded-lg">
                <i class="fas fa-map-marker-alt text-5xl text-[color:var(--main-color)] mb-4"></i>
                <h3 class="text-3xl text-[color:var(--black)] mx-0 my-4">office address</h3>
                <a href="#" class="block text-3xl text-[color:var(--light-color)] pt-2">Lorem ipsum, dolor sit amet consectetur um ut no.</a>
            </div>

        </div>

    </section>
    </MainLayout>
</template>


<script setup>
import {computed, ref} from 'vue'
import { useStore } from 'vuex'
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';
import InputError from "@/Components/InputError.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const form = useForm({
    name: '',
    email: '',
    phone: '',
    message: ''
});

const nameInput = ref(null);
const emailInput = ref(null);
const phoneInput = ref(null);
const messageInput = ref(null);

const store = useStore()

const isShowAside = computed(() => store.state.isShowAside)

const toggleAside = () => {
  store.commit('toggleAside')
}

const sendContact = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: (response) => {
            form.reset();
            console.log(response);
        },
        onError: () => {
            if (form.errors.name) {
                form.reset('name');
                nameInput.value.focus();
            }
            if (form.errors.email) {
                form.reset('email');
                emailInput.value.focus();
            }
            if (form.errors.phone) {
                form.reset('phone');
                phoneInput.value.focus();
            }
            if (form.errors.message) {
                form.reset('message');
                messageInput.value.focus();
            }
        },
    });

}

</script>


<style>

.contact .box-container {
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
}

</style>
