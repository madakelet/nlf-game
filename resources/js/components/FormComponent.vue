<template>
    <div class="card text-start">
        <div class="card-body">
            <h4 class="card-title">{{ form.week }}</h4>
            <p class="card-text">Body</p>
        </div>
    </div>
    
</template>
<script>
export default {
    name: "FormComponent",
    props: {
        form: {
            type: Object,
            required: true,
        },
    }
}
</script>