<template>
    <div id="menu-btn" class="fas fa-bars" 
    @click="toggleAside"></div>
</template>


<script>

import {mapMutations, mapState} from 'vuex';

export default {
    data() {
        return {

        };
    },
    computed:
        mapState({
            isShowAside: state => state.isShowAside,
        }),
    methods: {
        ...mapMutations(['toggleAside']),

    },
};

</script>