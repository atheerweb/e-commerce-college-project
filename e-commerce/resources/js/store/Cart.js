import { defineStore } from "pinia";

export const useCartStore = defineStore({
    id: "products-store",
    state: () => {
        return {
            cart_count: 0,
        };
    },
    actions: {
        async get_stored_cart_count() {
            let { data } = await axios.get("/cart");
            if (data) {
                this.cart_count = data.items;
            }
        },
        update_cart_count(payload) {
            this.cart_count = payload;
        },
    },
});
