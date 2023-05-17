div
<script setup>
import { ref } from "vue";
const props = defineProps(["products"]);
const step_2 = ref(false);
</script>
<template>
    <div class="pt-120">
        <div
            v-if="!step_2"
            class="d-flex justify-content-center align-items-start"
            style="gap: 3em"
        >
            <div
                class="d-flex flex-column justify-content-center align-items-center"
            >
                <cart-product :products="products" />
            </div>
            <order-summary :products="products" @step_2="(v) => (step_2 = v)" />
        </div>
        <billing-form v-if="step_2" :products="products" />
    </div>
</template>

<style></style>
