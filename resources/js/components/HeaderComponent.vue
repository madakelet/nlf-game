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
                </div>
            </div>
            <form class="d-flex" role="search"></form>
        </div>
    </nav>
</template>
<script>
import { items } from "../helpers/navbarItems";
export default {
    name: "HeaderComponent",
    setup() {
        return {
            items,
        };
    },
};
</script>
