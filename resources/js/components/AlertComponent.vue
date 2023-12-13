<template>
    <div class="alert alert-info mt-2 d-flex align-items-center" role="alert">
        <font-awesome-icon icon="circle-check" class="me-2" />
        <div>
            {{ message }}
        </div>
    </div>
</template>
<script>
export default {
    name: "AlertComponent",
    props: {
        message: {
            type: String,
        },
    },
}
</script>
