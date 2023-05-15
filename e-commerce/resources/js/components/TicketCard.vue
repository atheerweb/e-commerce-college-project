<script setup>
const props = defineProps(["tickets"]);
</script>

<template>
    <div>
        <v-card
            v-for="(ticket, index) in JSON.parse(tickets)"
            :key="index"
            width="790"
            height="200"
            class="d-flex"
        >
            <v-card-title class="pa-0">{{ ticket.name }}</v-card-title>

            <v-card-subtitle class="pa-0">
                {{ ticket.email }}
            </v-card-subtitle>
        </v-card>
    </div>
</template>
