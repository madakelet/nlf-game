<template>
    <div
        class="alert alert-danger mt-2 d-flex align-items-center"
        role="alert"
        v-if="message && message.length"
    >
        <font-awesome-icon
            icon="exclamation-triangle"
            class="me-2"
        />
        <div>
            {{ message[0] }}
        </div>
    </div>
</template>
<script>
export default {
    name: "ErrorComponent",
    props: {
        message: {
            type: [String, Array],
        },
    },
};
</script>
