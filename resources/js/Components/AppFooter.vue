<template>
    <footer
        class="bg-[color:var(--white)] border-[0.2rem] border-solid border-[rgba(0,0,0,0.1)] border-x-0 text-center text-3xl text-[color:var(--black)] mt-4 px-8 py-6 sticky top-[100vh]"
        :class="['footer', { 'wide-view': isShowAside }]"
    >
        &copy; copyright @ 2023 by
        <span class="text-[color:var(--main-color)] font-semibold">codease</span> | all rights
        reserved!
    </footer>
</template>

<script>
import {mapMutations, mapState} from "vuex";

export default {
    computed: mapState({
        isShowAside: (state) => state.isShowAside,
    }),
    methods: {
        ...mapMutations(["toggleAside"]),
    },
};
</script>


