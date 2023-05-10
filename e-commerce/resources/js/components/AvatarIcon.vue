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
                    <mdicon name="account" class="account-icon" />
                </v-avatar>
            </template>

            <v-list>
                <v-list-item>
                    <v-list-item-title @click="logout()" class="pointer">
                        <mdicon name="logout" class="logout-icon" />
                        <span>logout</span>
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
