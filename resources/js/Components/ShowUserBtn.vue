<template>
    <div id="user-btn" class="fas fa-user"
    @click="toggleUserProfile"></div>
</template>

<script>

import { mapMutations, mapState } from 'vuex';

export default {
    data() {
        return {

        };
    },
    computed:
        mapState({
            isProfileVisible: state => state.isProfileVisible,
        }),
    methods: {
        ...mapMutations(['toggleUserProfile']),
    },
};
</script>