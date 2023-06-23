<template>
    <header
        class="px-8 bg-[color:var(--white)] border-[0.2rem] border-solid border-[rgba(0,0,0,0.1)] border-x-0 sticky z-[1000] top-0 inset-x-0"
        :class="['header', { 'wide-view': isShowAside }]"
    >
        <div class="relative flex items-center justify-between py-6">
            <Link href="/">
                <img src="/assets/logo.png" alt="logo" class="w-20">
            </Link>
            

            <div class="icons flex gap-3">
                <CloseAsideBtn />

                <Link :href="route('search')">
                    <div id="search-btn" class="fas fa-search"></div>
                </Link>
                
                <ShowUserBtn />

                <NightModeBtn />
            </div>

            <div
                class="absolute flex flex-col items-center bg-[color:var(--white)] overflow-hidden w-[30rem] p-6 rounded-[10px] border-[0.2rem] border-solid border-[rgba(0,0,0,0.1)] origin-top-right right-8 top-[120%]"
                :class="['profile', { active: isProfileVisible }]"
            >
                <img
                    src="/assets/avatar-pic.png"
                    class="image h-40 w-40 object-cover mb-2 rounded-[50%]"
                    alt=""
                />
                <h3 class="name text-3xl text-[color:var(--black)]">
                    {{ $page.props.auth.user ? $page.props.auth.user.name : '' }}
                </h3>
                <Link :href="route('profile.edit')" class="btn" v-if="$page.props.auth.user != null">view profile</Link>
                <div class="flex-btn w-full" v-if="$page.props.auth.user === null">
                    <Link :href="route('login')" class="inline-option-btn w-1/2"
                        >Log in</Link
                    >
                    <Link
                        :href="route('register')"
                        class="inline-option-btn w-1/2"
                        >Register</Link
                    >
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import NightModeBtn from "@/Components/NightModeBtn.vue";
import CloseAsideBtn from "@/Components/CloseAsideBtn.vue";
import ShowUserBtn from "@/Components/ShowUserBtn.vue";
import { mapMutations, mapState } from "vuex";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
        NightModeBtn,
        CloseAsideBtn,
        ShowUserBtn,
    },
    computed: mapState({
        isProfileVisible: (state) => state.isProfileVisible,
        isShowAside: (state) => state.isShowAside,
        user: (state) => state.user,
        email: (state) => state.email,
    }),
    methods: {
        ...mapMutations(["toggleUserProfile", "toggleAside", "setUserEmail"]),
    },
};
</script>

<style>

.header .flex .icons div {
    font-size: 2rem;
    color: var(--black);
    background-color: var(--light-bg);
    border-radius: 0.5rem;
    height: 4.5rem;
    width: 4.5rem;
    line-height: 4.5rem;
    cursor: pointer;
    text-align: center;
    margin-left: 0.7rem;
}

.header .flex .icons div:hover {
    background-color: var(--black);
    color: var(--white);
}

.header .flex .profile {
    transform: scale(0);
    transition: 0.2s linear;
}

.header .flex .profile.active {
    transform: scale(1);
}
</style>
