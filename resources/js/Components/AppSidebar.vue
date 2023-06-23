<template>
    <aside
        class="fixed w-[30rem] bg-[color:var(--white)] h-screen border-[0.2rem] border-solid border-[rgba(0,0,0,0.1)] z-[1200] left-0 top-0"
        :class="['side-bar', { 'hide-sidebar': isShowAside }]"
    >
        <div id="close-btn" @click="toggleAside" class="text-right hidden p-8">
            <i
                class="fas fa-times text-right text-[2.5rem] text-[color:var(--main-color)] cursor-pointer h-14 w-14 leading-[3.5rem] text-center rounded-lg; background: var(--main-color) hover:bg-[color:var(--black)]"
            ></i>
        </div>

        <div class="profile flex flex-col items-center text-center px-8 py-12">
            <img
                src="/assets/avatar-pic.png"
                class="image h-40 w-40 object-contain mb-4 rounded-[50%]"
                alt=""
            />
            <h3
                class="name text-[2rem] text-[color:var(--black)] overflow-hidden text-ellipsis whitespace-nowrap"
            >
                {{ $page.props.auth.user ? $page.props.auth.user.name : '' }}
            </h3>
            <Link :href="route('profile.edit')" class="btn" v-if="$page.props.auth.user != null">view profile</Link>
            <Link
                        :href="route('register')"
                        class="inline-btn w-full"
                        v-if="$page.props.auth.user === null"
                        >Register</Link
                    >
        </div>

        <nav class="navbar">
            <Link
                href="/"
                class="block text-3xl p-8 hover:bg-[color:var(--light-bg)]"
                ><i class="fas fa-home mr-6 text-[color:var(--main-color)]"></i
                ><span class="text-[color:var(--light-color)]">home</span></Link
            >
            <Link
                :href="route('about')"
                class="block text-3xl p-8 hover:bg-[color:var(--light-bg)]"
                ><i
                    class="fas fa-question mr-6 text-[color:var(--main-color)]"
                ></i
                ><span class="text-[color:var(--light-color)]"
                    >&nbsp;&nbsp;about</span
                ></Link
            >
            <Link
                :href="route('courses')"
                class="block text-3xl p-8 hover:bg-[color:var(--light-bg)]"
                ><i
                    class="fas fa-graduation-cap mr-6 text-[color:var(--main-color)]"
                ></i
                ><span class="text-[color:var(--light-color)]"
                    >courses</span
                ></Link
            >
            <Link
                :href="route('contact')"
                class="block text-3xl p-8 hover:bg-[color:var(--light-bg)]"
                ><i
                    class="fas fa-headset mr-6 text-[color:var(--main-color)]"
                ></i
                ><span class="text-[color:var(--light-color)]"
                    >contact us</span
                ></Link
            >
        </nav>
    </aside>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { mapMutations, mapState } from "vuex";

export default {
    components: { Link },
    computed: mapState({
        isShowAside: (state) => state.isShowAside,
        email: (state) => state.email,
    }),
    methods: {
        ...mapMutations(["toggleAside", "setUserEmail"]),
    },
};
</script>

<style>
.side-bar .navbar a i {
    transition: 0.2s linear;
}

.side-bar .navbar a:hover i {
    margin-right: 2.5rem;
}

.hide-sidebar {
    display: none;
}
</style>
