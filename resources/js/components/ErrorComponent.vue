<template>
    <div class="alert alert-danger mt-2" role="alert" v-if="message && message.length">
        {{ message[0] }}
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
}
</script>
