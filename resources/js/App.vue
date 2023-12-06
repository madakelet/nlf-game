<template>
    <DefaultLayout v-if="this.$route.meta.layout == 'default'" />
    <AuthLayout v-else-if="this.$route.meta.layout == 'auth'" />
</template>
<script>
import AuthLayout from "./layouts/AuthLayout.vue";
import DefaultLayout from "./layouts/DefaultLayout.vue";
export default {
    name: "App",
    components: { DefaultLayout, AuthLayout },
};
</script>
