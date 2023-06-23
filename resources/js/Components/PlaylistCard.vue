<script setup>
import {useStore} from "vuex";
import {computed, ref} from "vue";
import axios from "axios";

const store = useStore();

const isShowAside = computed(() => store.state.isShowAside);

const props = defineProps({
    playlistCard: {
        type: Object,
        required: true,
        default: () => ({
            title: 'Complete HTML tutorial',
            author: 'john deo',
            date: '21-10-2022',
            description: 'lorem',
            image: '/assets/course-html.png',
        })
    },
    favouriteCourses: {
        type: Array,
        required: true,
        default: () => []
    },
});


let innerFavouriteCourses = props.favouriteCourses;

const isFavourite = ref(false);

const toggleFavourite = (playlistCard) => {
    axios.post(route('courses.favourite.add'), {
        course_id: playlistCard.id
    }).then((response) => {
        console.log(response.data);
        alert(response.data.message);
        isFavourite.value = response.data.favourite;
    }).catch((error) => {
        console.log(error);
    });
}

</script>


<template>
    <section :class="['playlist-details', { 'wide-view': isShowAside }]">
        <h1 class="heading">playlist details</h1>

        <div
            class="row flex items-end gap-12 flex-wrap bg-[color:var(--white)] p-8 pb-12"
        >
            <div class="column">
                <div>
                    <button
                        type="submit"
                        class="bg-[color:var(--light-bg)] cursor-pointer px-6 py-4 mb-6 rounded-lg hover:bg-[color:var(--black)]"
                        @click.prevent="toggleFavourite(playlistCard)"
                    >
                        <i
                            class="far fa-bookmark text-2xl text-[color:var(--black)] mr-4 hover:text-[color:var(--white)]"
                        ></i>
                        <span v-if="isFavourite"
                              class="text-2xl text-[color:var(--light-color)] hover:text-[color:var(--white)]"
                        >Remove from Favourites</span
                        >
                        <span v-else
                              class="text-2xl text-[color:var(--light-color)] hover:text-[color:var(--white)]"
                        >Add to Favourites</span
                        >
                    </button>
                </div>

                <div class="thumb relative">
                    <img
                        class="h-[26rem] w-full object-cover rounded-lg"
                        :src="playlistCard.image"
                        alt=""
                    />
                    <span
                        class="absolute top-4 left-4 py-3 px-9 rounded-lg text-white text-2xl"
                    >{{ playlistCard.videos.length }} videos</span
                    >
                </div>
            </div>
            <div class="column">
                <div class="tutor flex items-center gap-8 mb-8">
                    <img
                        class="h-20 w-20 object-cover rounded-[50%]"
                        src="/assets/avatar-pic.png"
                        alt=""
                    />
                    <div>
                        <h3
                            class="text-3xl font-semibold text-[color:var(--black)] mb-1"
                        >
                            {{ playlistCard.author }}
                        </h3>
                        <span
                            class="text-2xl text-[color:var(--light-color)]"
                        >{{ playlistCard.date }}</span
                        >
                    </div>
                </div>

                <div class="details">
                    <h3
                        class="text-3xl font-semibold text-[color:var(--black)] capitalize"
                    >
                        {{ playlistCard.title }}
                    </h3>
                    <p
                        class="leading-relaxed text-3xl text-[color:var(--light-color)] px-0 py-4"
                    >
                        {{ playlistCard.description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
