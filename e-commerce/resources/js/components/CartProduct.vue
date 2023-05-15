<script setup>
const props = defineProps(["products"]);
</script>

<template>
    <div class="d-flex flex-column" style="gap: 1em">
        <v-card
            v-for="(product, index) in JSON.parse(products)"
            :key="index"
            width="510"
            height="200"
            class="d-flex"
        >
            <v-img :src="product.image" width="200"></v-img>
            <div class="d-flex flex-column pa-5" style="gap: 1.5em">
                <v-card-title class="pa-0">{{ product.name }}</v-card-title>
                <div class="d-flex justify-space-between">
                    <v-card-subtitle class="pa-0"
                        >quantity:{{ product.quantity }}</v-card-subtitle
                    >
                    <h5
                        class="font-weight-bold text-black"
                        style="color: #fe7865 !important"
                    >
                        {{ product.price }}$
                    </h5>
                </div>
            </div>
        </v-card>
    </div>
</template>

<!-- <style></style> -->
