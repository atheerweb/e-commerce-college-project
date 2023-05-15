<script setup>
import axios from "axios";

import { ref } from "vue";
const search_text = ref("");
const loading = ref(false);
const items = ref([]);
const search = async () => {
    if (search_text.value.length > 3) {
        loading.value = true;
        const { data } = await axios.get(`/search/${search_text.value}`);
        items.value = data;
        loading.value = false;
    } else {
        items.value = [];
    }
};
const redirect = () => {
    return window.location.replace("/products");
};
</script>

<template>
    <v-autocomplete
        v-model:search="search_text"
        :loading="loading"
        :items="items"
        item-title="name"
        density="compact"
        label="Search"
        prepend-inner-icon="mdi-magnify"
        append-inner-icon=""
        single-line
        hide-details
        return-object
        variant="outlined"
        no-data-text="no results found"
        @update:search="search()"
        @keyup.enter="redirect()"
    ></v-autocomplete>
</template>

<style></style>
