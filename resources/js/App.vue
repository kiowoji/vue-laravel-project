<template>
    <section id="main-section" :class="{ 'dark dark-bg': isNightModeActive, 'wide-view': !isShowAside}">
        <AppHeader/>
        <AppSidebar/>
        <router-view/>
        <AppFooter/>
    </section>
</template>

<script>
import AppHeader from './Components/AppHeader.vue'
import AppSidebar from './Components/AppSidebar.vue'
import AppFooter from './Components/AppFooter.vue'
import {mapMutations, mapState} from "vuex";


export default {
    name: 'App',
    components: {
        AppHeader,
        AppSidebar,
        AppFooter
    },
    computed: mapState(['isNightModeActive'], ['isShowAside']),
    methods: {
        ...mapMutations(['setUser']),
    },
    mounted() {

    }
}
</script>

