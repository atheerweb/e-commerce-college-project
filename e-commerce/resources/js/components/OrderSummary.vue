<script setup>
import { ref } from "vue";
const props = defineProps(["products"]);
const parsed_products = ref(JSON.parse(props.products));
const products_prices = parsed_products.value.map((product) => product.price);
const product_sum = ref(
    products_prices.reduce(
        (accumulator, currentValue) => accumulator + currentValue,
        0
    )
);
const step_2 = ref(false);
defineEmits(["step_2"]);
// const product_sum = ref(props.products.map((product) => product.price));
</script>

<template>
    <div>
        <div class="sticky-card">
            <v-card class="pa-5" width="300x">
                <v-card-title class="font-weight-bold pa-0 mb-5 text-center"
                    >ORDER SUMMARY</v-card-title
                >
                <div class="d-flex flex-column" style="gap: 1em">
                    <div
                        v-for="(product, index) in parsed_products"
                        :key="index"
                        class="d-flex justify-space-between"
                    >
                        <v-card-text
                            class="text-capitalize pa-0 d-flex flex-start"
                        >
                            {{ product.name }}
                        </v-card-text>
                        <v-card-text
                            class="text-capitalize pa-0 d-flex flex-row-reverse font-weight-bold text-primary"
                        >
                            {{ product.price }}$
                        </v-card-text>
                    </div>
                    <v-divider
                        class="border-opacity-100"
                        color="black"
                    ></v-divider>
                    <div class="d-flex justify-space-between">
                        <v-card-text
                            class="text-capitalize pa-0 d-flex flex-start"
                        >
                            Total:
                        </v-card-text>
                        <v-card-text
                            class="text-capitalize pa-0 d-flex flex-row-reverse font-weight-bold text-primary"
                        >
                            {{ product_sum }}$
                        </v-card-text>
                    </div>
                </div>
                <button
                    class="main-btn font-weight-bold w-100 mt-5"
                    @click="$emit('step_2', true)"
                >
                    CHECKOUT
                </button>
            </v-card>
        </div>
    </div>
</template>

<style>
.sticky-card {
    position: sticky;
    top: 6em;
}
</style>
