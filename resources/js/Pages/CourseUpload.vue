<template>
    <MainLayout v-cloak>
        <section
            :class="['course-upload', { 'wide-view': isShowAside }]"
            class="flex justify-center m-8"
        >
            <form
                action="#"
                method="post"
                @submit.prevent="uploadCourse"
                enctype="multipart/form-data"
                class="bg-[color:var(--white)] text-center p-8 rounded-lg sm:w-[90%] md:w-[65%] lg:w-[50%]"
            >
                <h3 class="text-[color:var(--black)] text-4xl capitalize mb-4">
                    Upload New course
                </h3>

                <input
                    type="text"
                    placeholder="Title"
                    name="title"
                    ref="titleInput"
                    v-model="form.title"
                    required
                    maxlength="50"
                    class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-4 p-3 rounded-lg"
                />
                <InputError :message="form.errors.title" class="mt-2" />
                <input
                    type="text"
                    placeholder="Author"
                    name="author"
                    ref="authorInput"
                    v-model="form.author"
                    required
                    maxlength="50"
                    class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-4 p-3 rounded-lg"
                />
                <InputError :message="form.errors.author" class="mt-2" />
                <input
                    type="date"
                    placeholder="Date"
                    name="date"
                    ref="dateInput"
                    v-model="form.date"
                    required
                    maxlength="50"
                    class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-4 p-3 rounded-lg"
                />
                <InputError :message="form.errors.date" class="mt-2" />
                <textarea
                    name="description"
                    class="box w-full h-40 bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-4 p-3 rounded-lg"
                    placeholder="Description"
                    ref="descriptionInput"
                    v-model="form.description"
                    required
                    maxlength="1000"
                    cols="30"
                    rows="10"
                ></textarea>
                <InputError :message="form.errors.description" class="mt-2" />
                <input
                    type="file"
                    name="image"
                    ref="imageInput"
                    @change="onImageChange"
                    class="box w-full bg-[color:var(--light-bg)] text-2xl text-[color:var(--black)] mx-0 my-4 p-3 rounded-lg"
                />
                <InputError :message="form.errors.image" class="mt-2" />
                <input
                    id="contact-btn"
                    type="submit"
                    value="upload course"
                    class="inline-btn"
                    name="submit"
                />
            </form>
        </section>
    </MainLayout>
</template>

<script setup>
import { computed, ref } from "vue";
import { useStore } from "vuex";
import MainLayout from "@/Layouts/MainLayout.vue";
import { useForm } from "@inertiajs/vue3";
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
    title: "",
    author: "",
    date: "",
    description: "",
    image: null,
});

const titleInput = ref(null);
const authorInput = ref(null);
const dateInput = ref(null);
const descriptionInput = ref(null);
const imageInput = ref(null);

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const toggleAside = () => {
    store.commit("toggleAside");
};

const uploadCourse = () => {
    form.post(route("course.store"), {
        preserveScroll: true,
        onSuccess: (response) => {
            form.reset();
            console.log(response);
            alert("Course successfully added");
        },
        onError: () => {
            if (form.errors.title) {
                form.reset("title");
                titleInput.value.focus();
            }
            if (form.errors.author) {
                form.reset("author");
                authorInput.value.focus();
            }
            if (form.errors.date) {
                form.reset("date");
                dateInput.value.focus();
            }
            if (form.errors.description) {
                form.reset("description");
                decsriptionInput.value.focus();
            }
            if (form.errors.image) {
                form.reset("image");
                imageInput.value.focus();
            }
        },
    });
};
const onImageChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
    }
};
</script>
