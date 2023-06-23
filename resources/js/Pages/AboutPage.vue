<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { computed } from 'vue'
import { useStore } from 'vuex'
import MainLayout from "@/Layouts/MainLayout.vue";

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

const store = useStore()

const isShowAside = computed(() => store.state.isShowAside)

const toggleAside = () => {
  store.commit('toggleAside')
}

</script>

<template>
    <MainLayout v-cloak>
           <Head title="About Us" />
    <section :class="['about', { 'wide-view': isShowAside }]">

        <div class="row flex items-center gap-6">

            <div class="image w-auto flex-[1_1_40rem] h-auto">
                <img src="/assets/about-pic.png" alt="">
            </div>

            <div class="content flex-[1_1_40rem]">
                <h3 class="text-5xl text-[color:var(--black)] capitalize">about us</h3>
                <p class="text-3xl leading-relaxed text-[color:var(--light-color)] px-0 py-4">Welcome to our website, 
                    where we provide a wide range of free programming courses to help individuals unlock their potential in the world of coding. 
                    Our mission is to make programming education accessible to all, regardless of their background or prior experience. 
                    Join our community today and embark on a journey of learning.</p>
                <Link :href="route('courses')" class="inline-btn">our courses</Link>
            </div>

        </div>

        <div class="box-container grid gap-6 justify-center items-start mt-2 grid-cols-[repeat(auto-fit,minmax(30rem,1fr))]">

            <div class="box bg-[color:var(--white)] flex items-center gap-10 p-8 rounded-lg">
                <i class="fas fa-graduation-cap text-5xl text-[color:var(--main-color)]"></i>
                <div>
                    <h3 class="text-2xl text-[color:var(--black)] mb-0.5 font-bold">+10k</h3>
                    <p class="text-2xl text-[color:var(--light-color)]">online courses</p>
                </div>
            </div>

            <div class="box bg-[color:var(--white)] flex items-center gap-10 p-8 rounded-lg">
                <i class="fas fa-user-graduate text-5xl text-[color:var(--main-color)]"></i>
                <div>
                    <h3 class="text-2xl text-[color:var(--black)] mb-0.5 font-bold">+40k</h3>
                    <p class="text-2xl text-[color:var(--light-color)]">brilliant users</p>
                </div>
            </div>

            <div class="box bg-[color:var(--white)] flex items-center gap-10 p-8 rounded-lg">
                <i class="fas fa-chalkboard-user text-5xl text-[color:var(--main-color)]"></i>
                <div>
                    <h3 class="text-2xl text-[color:var(--black)] mb-0.5 font-bold">+2k</h3>
                    <p class="text-2xl text-[color:var(--light-color)]">expert tutors</p>
                </div>
            </div>

        </div>

    </section>

    <section :class="['reviews', { 'wide-view': isShowAside }]">

        <h1 class="heading">User's reviews</h1>

        <div class="box-container grid gap-6 justify-center items-start grid-cols-[repeat(auto-fit,minmax(30rem,1fr))]">

            <div class="box bg-[color:var(--white)] p-8 rounded-lg">
                <p class="leading-relaxed text-2xl text-[color:var(--light-color)]">The HTML for Beginners course was an 
                    excellent introduction to programming concepts, with clear explanations and practical examples that helped me grasp the fundamentals quickly.</p>
                <div class="student flex items-center gap-6 mt-3">
                    <img class="h-16 w-16 object-cover rounded-[50%]" src="/assets/avatar-pic.png" alt="">
                    <div>
                        <h3 class="text-2xl font-semibold text-[color:var(--black)] mb-1">John Deo</h3>
                        <div class="stars text-xl text-[color:var(--orange)]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box bg-[color:var(--white)] p-8 rounded-lg">
                <p class="leading-relaxed text-2xl text-[color:var(--light-color)]">The JavaScript Frameworks course was a fantastic resource for learning popular frameworks like React and Angular. 
                    Well-structured content made the learning process smooth and enjoyable.</p>
                <div class="student flex items-center gap-6 mt-3">
                    <img class="h-16 w-16 object-cover rounded-[50%]" src="/assets/avatar-pic.png" alt="">
                    <div>
                        <h3 class="text-2xl font-semibold text-[color:var(--black)] mb-1">Anne May</h3>
                        <div class="stars text-xl text-[color:var(--orange)]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box bg-[color:var(--white)] p-8 rounded-lg">
                <p class="leading-relaxed text-2xl text-[color:var(--light-color)]">The Bootstrap Theming course unlocked the power of customization. By understanding how 
                    to modify Bootstrap variables and styles, I was able to create unique designs that perfectly aligned with my project.</p>
                <div class="student flex items-center gap-6 mt-3">
                    <img class="h-16 w-16 object-cover rounded-[50%]" src="/assets/avatar-pic.png" alt="">
                    <div>
                        <h3 class="text-2xl font-semibold text-[color:var(--black)] mb-1">Alex Brown</h3>
                        <div class="stars text-xl text-[color:var(--orange)]">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    </MainLayout>
</template>

