/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";
import Vue3Toastify from "vue3-toastify";
import { createPinia } from "pinia";
import mdiVue from "mdi-vue/v3";
import * as mdijs from "@mdi/js";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});
const pinia = createPinia();

app.use(Vue3Toastify);
import AddToCartButton from "./components/AddToCartButton.vue";
import NavigationCart from "./components/NavigationCart.vue";
import AvatarIcon from "./components/AvatarIcon.vue";
import SearchInput from "./components/SearchInput.vue";
import CartProduct from "./components/CartProduct.vue";
import OrderSummary from "./components/OrderSummary.vue";
import SupportForm from "./components/SupportForm.vue";
import TicketCard from "./components/TicketCard.vue";
import BillingForm from "./components/BillingForm.vue";
import CheckOutPage from "./components/CheckOutPage.vue";

// Vuetify
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
//import "@mdi/font/css/materialdesignicons.css"; // Ensure you are using css-loader

app.use(pinia);
app.component("add-to-cart-button", AddToCartButton);
app.component("navigation-cart", NavigationCart);
app.component("cart-product", CartProduct);
app.component("avatar-icon", AvatarIcon);
app.component("search-input", SearchInput);
app.component("order-summary", OrderSummary);
app.component("support-form", SupportForm);
app.component("ticket-card", TicketCard);
app.component("billing-form", BillingForm);
app.component("check-out-page", CheckOutPage);

const vuetify = createVuetify({
    components,
    directives,
    icons: {
        defaultSet: "mdi", // This is already the default value - only for display purposes
    },

    theme: {
        themes: {
            light: {
                dark: false,
                colors: {
                    primary: "#fe7865",
                },
            },
        },
    },
});

app.use(vuetify);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");
