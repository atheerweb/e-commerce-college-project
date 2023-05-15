<script setup>
import { ref } from "vue";
import { toast } from "vue3-toastify";
import axios from "axios";
const data = ref({ name: "", email: "", message: "" });
const submit = async () => {
    const res = await axios.post("/support", data.value);

    if (res.data.message) {
        return toast.success(res.data.message, {
            autoClose: 1000,
        });
    }
};
</script>
<template>
    <form>
        <div class="row">
            <div class="col-lg-6">
                <div class="single-form form-group">
                    <v-text-field
                        v-model="data.name"
                        type="text"
                        name="name"
                        placeholder="Enter Your Name"
                        data-error="Name is required."
                        required="required"
                    />
                    <div class="help-block with-errors"></div>
                </div>
                <!-- single form -->
            </div>
            <div class="col-lg-6">
                <div class="single-form form-group">
                    <v-text-field
                        v-model="data.email"
                        type="email"
                        name="email"
                        placeholder="Enter Your Email"
                        data-error="Valid email is required."
                        required="required"
                    />
                    <div class="help-block with-errors"></div>
                </div>
                <!-- single form -->
            </div>
            <div class="col-lg-12">
                <div class="single-form form-group">
                    <v-textarea
                        v-model="data.message"
                        name="message"
                        placeholder="Enter Your Message"
                        data-error="Please,leave us a message."
                        required="required"
                    ></v-textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <!-- single form -->
            </div>
            <p class="form-message"></p>
            <div class="single-form form-group">
                <button
                    class="main-btn font-weight-bold button"
                    @click.prevent="submit"
                >
                    CONTACT NOW
                </button>
            </div>
        </div>
        <!-- row -->
    </form>
</template>

<style>
.button {
    color: white !important;
}
.button:hover {
    color: #fe7865 !important;
}
</style>
