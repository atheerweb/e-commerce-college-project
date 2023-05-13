<script setup>
import axios from "axios";
import { ref } from "vue";
const search_text = ref("");
const search = async () => {
    await axios.get(`/search/${search_text.value}`);
};
</script>

<template>
    <v-autocomplete
        v-model:search="search_text"
        density="compact"
        label="Search"
        prepend-inner-icon="mdi-magnify"
        append-inner-icon=""
        single-line
        hide-details
        variant="outlined"
        @update:search="search(search_text)"
    ></v-autocomplete>
</template>

<style></style>
