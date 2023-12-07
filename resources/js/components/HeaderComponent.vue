<template>
    <nav class="nav navbar navbar-expand-md header py-1 mb-3 sticky-top">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse justify-content-center justify-content-end"
                id="navbarNav"
            >
                <div class="navbar-nav">
                    <router-link
                        class="nav-link"
                        v-for="item in items"
                        :key="item.name"
                        :to="item.to"
                    >
                        {{ item.name }}</router-link
                    >
                    <router-link class="nav-link" to="/users" v-if="isAdmin"
                        >felhasználók</router-link
                    >
                    <router-link class="nav-link" to="/forms" v-if="isAdmin"
                        >formok</router-link
                    >
                    <a class="nav-link" style="cursor: pointer" @click="logout">
                        <font-awesome-icon
                            :icon="['fas', 'power-off']"
                            color="#E3655B"
                        >
                        </font-awesome-icon>
                    </a>
                </div>
            </div>
            <form class="d-flex" role="search"></form>
        </div>
    </nav>
</template>
<script>
import { items } from "../helpers/navbarItems";
import useLogin from "../composables/login";
import { onMounted } from "vue";
export default {
    name: "HeaderComponent",
    setup() {
        const { logout, isAdmin, getIsAdmin } = useLogin();
        onMounted(() => {
            getIsAdmin();
        });

        return {
            items,
            logout,
            isAdmin,
        };
    },
};
</script>
