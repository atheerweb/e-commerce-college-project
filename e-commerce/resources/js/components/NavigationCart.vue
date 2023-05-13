<script setup>
import { onMounted, ref } from "vue";
import { useCartStore } from "../store/Cart";
const cart_store = useCartStore();
onMounted(() => {
    cart_store.get_stored_cart_count();
    console.log(cart_store);
});
</script>

<template>
    <div>
        <a data-scroll-nav="0" href="/cart">
            <v-icon icon="mdi-cart" class="my-icon" />
            <span class="cart-numbers">{{ cart_store.cart_count }}</span>
        </a>
    </div>
</template>

<style>
.my-icon {
    color: #fe7865;
}
.cart-numbers {
    color: #fe7865;

    padding: 0.1em;
    margin-left: -0.3em;
    font-size: 0.9rem;
}
</style>
