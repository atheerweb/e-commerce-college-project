<script setup>
import axios from "axios";
const logout = async () => {
    await axios.post("/logout");
    location.reload();
};
</script>

<template>
    <div>
        <v-menu location="bottom">
            <template v-slot:activator="{ props }">
                <v-avatar v-bind="props" color="#fe7865" class="pointer">
                    <v-icon icon="mdi-account" class="account-icon" />
                </v-avatar>
            </template>

            <v-list>
                <v-list-item>
                    <v-list-item-title @click="logout()" class="pointer mb-3">
                        <v-icon icon="mdi-account" class="logout-icon mr-2" />
                        <span class="text-capitalize text-grey-darken-1">my profile</span>
                    </v-list-item-title>

                    <v-list-item-title @click="logout()" class="pointer">
                        <v-icon icon="mdi-logout" class="mr-2 text-red" />
                        <span
                            class="text-capitalize text-grey-darken-1">
                            logout
                        </span>
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<style scoped>
.account-icon {
    color: white;
}
.logout-icon {
    color: #fe7865;
}
</style>
