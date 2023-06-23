<template>
    <form
       @submit.prevent="submitForm"
        class="search-form w-[65%] flex items-center gap-8 bg-[color:var(--white)] px-4 py-2 rounded-xl"
    >
        <input
            v-model="searchTerm" 
            class="w-full text-[18px] text-[color:var(--black)] bg-inherit"
            type="text"
            name="search_box"
            required
            placeholder="search courses..."
            maxlength="50"
        />
        <button
            type="submit"
            class="fas fa-search text-3xl mr-2 text-[color:var(--black)] cursor-pointer hover:text-[color:var(--main-color)]"
        ></button>
    </form>
</template>

<script setup>
import { ref } from 'vue';

    const searchTerm = ref('');

    const submitForm = () => {
        if (searchTerm.value.trim()) {
            const searchUrl = route('search', { search_box: searchTerm.value.trim() });
            window.location.href = searchUrl;
        }
    };
</script>

