<script setup>
import { useCartStore } from "../store/Cart";
import axios from "axios";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

const props = defineProps(["productId", "userId"]);
const cart_store = useCartStore();

const add_to_cart = async () => {
    if (!props.userId) {
        return toast.warning("you need to login first to add product to cart", {
            autoClose: 1000,
        });
    }

    let { data } = await axios.post("/cart", {
        product_id: props.productId,
    });

    cart_store.update_cart_count(data.items);
};
</script>

<template>
    <div class="d-flex justify-content-center mt-3">
        <button class="main-btn" @click.prevent="add_to_cart()">
            add to cart
        </button>
    </div>
</template>
