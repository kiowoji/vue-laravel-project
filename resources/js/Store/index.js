import { createApp } from 'vue';
import { createStore } from 'vuex';


const store = createStore(
    {
        state: {
            isNightModeActive: true,
            isShowAside: false,
            isProfileVisible: false,
            user: null,
            email: '',
            isShowVideoModal: false,
            modalVideo: {
                id: null,
                title: '',
                description: '',
                url: '',
            }
        },
        mutations: {
            toggleNightMode(state) {
                state.isNightModeActive = !state.isNightModeActive;
            },
            toggleAside(state) {
                state.isShowAside = !state.isShowAside;
            },
            toggleUserProfile(state) {
                state.isProfileVisible = !state.isProfileVisible;
            },
            setUser(state, user) {
                state.user = user;
            },
            setUserEmail(state, email) {
                state.email = email;
            },
            toggleVideoModal(state) {
                state.isShowVideoModal = !state.isShowVideoModal;
            },
            showVideoModal(state) {
                state.isShowVideoModal = true;
            },
            closeVideoModal(state) {
                state.isShowVideoModal = false;
            },
            setModalVideo(state, video) {
                state.modalVideo = video;
            },
            clearModalVideo(state) {
                state.modalVideo = {
                    id: null,
                    title: null,
                    description: null,
                    url: null,
                };
            }
        }
    }
);


export default store;
