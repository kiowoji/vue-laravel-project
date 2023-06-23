<template>
    <div id="toggle-btn" class="fas"
    :class="isNightModeActive ? 'fa-moon' : 'fa-sun'"
    @click="toggleNightMode"></div>
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
            isNightModeActive: state => state.isNightModeActive,
        }),
    methods: {
        ...mapMutations(['toggleNightMode']),
    },
};
</script>


