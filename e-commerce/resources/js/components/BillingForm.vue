<script setup>
import { defineProps } from "vue";
import { Form, Field } from "vee-validate";
import * as yup from "yup";
import axios from "axios";

const card_types = ["visa", "master card"];
const props = defineProps(["products"]);
const months = [
    "01",
    "02",
    "03",
    "04",
    "05",
    "06",
    "07",
    "08",
    "09",
    "10",
    "11",
    "12",
];
const years = [
    "2023",
    "2024",
    "2025",
    "2026",
    "2027",
    "2028",
    "2029",
    "2030",
    "2031",
    "2032",
    "2033",
    "2034",
];

const schema = yup.object({
    card_type: yup.string().required().label("Card Type"),
    card_number: yup.string().min(16).required().label("Card Number"),
    card_cvv: yup.string().min(3).max(3).required().label("CVV"),
    exp_month: yup.string().min(2).required().label("Expiration Month"),
    exp_year: yup.string().min(4).required().label("Expiration Year"),
});

const onSubmit = (values) => {
    axios.post("/process/user/payment", {
        ...values,
        order: JSON.parse(props.products),
    });
};
</script>
<template>
    <v-card class="mt-10 ml-150 mr-150 pa-12">
        <v-card-title class="font-weight-black text-primary text-h5 pa-0 mb-5"
            >SECURE PAYMENT</v-card-title
        >
        <Form
            @submit="onSubmit"
            :validation-schema="schema"
            v-slot="{ errors }"
        >
            <v-row>
                <v-col cols="12">
                    <Field name="card_type" v-slot="{ field, errors }">
                        <v-select
                            v-bind="field"
                            :items="card_types"
                            variant="outlined"
                            label="Card Type"
                            :error-messages="errors"
                        ></v-select>
                    </Field>
                </v-col>
                <v-col cols="10">
                    <Field name="card_number" v-slot="{ field, errors }">
                        <v-text-field
                            v-bind="field"
                            :error-messages="errors"
                            type="text"
                            variant="outlined"
                            label="Card Number"
                        ></v-text-field>
                    </Field>
                </v-col>
                <v-col cols="2">
                    <Field name="card_cvv" v-slot="{ field, errors }">
                        <v-text-field
                            v-bind="field"
                            type="text"
                            variant="outlined"
                            label="CVV"
                            :error-messages="errors"
                        ></v-text-field>
                    </Field>
                </v-col>
                <v-col cols="12" class="pa-0 mb-2">
                    <v-card-subtitle class="text-subtitle-1">
                        Expiration Date
                    </v-card-subtitle>
                </v-col>
                <v-col>
                    <Field name="exp_month" v-slot="{ field, errors }">
                        <v-select
                            v-bind="field"
                            :items="months"
                            name="exp_month"
                            type="text"
                            variant="outlined"
                            label="Month"
                            :error-messages="errors"
                        ></v-select>
                    </Field>
                </v-col>
                <v-col>
                    <Field name="exp_year" v-slot="{ field, errors }">
                        <v-select
                            v-bind="field"
                            :items="years"
                            type="text"
                            variant="outlined"
                            label="Year"
                            :error-messages="errors"
                        ></v-select>
                    </Field>
                </v-col>
            </v-row>

            <v-hover v-slot="{ isHovering, props }">
                <v-btn
                    v-bind="props"
                    :disabled="Object.keys(errors).length"
                    type="submit"
                    elevation="1"
                    height="50"
                    x-small
                    :class="isHovering ? 'text-primary' : 'text-white'"
                    :color="isHovering ? 'white' : 'primary'"
                >
                    Place Order
                </v-btn>
            </v-hover>
        </Form>
    </v-card>
</template>
<style></style>
