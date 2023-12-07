<template>
    <div class="container my-2">
        <div class="row form-component p-2">
            <div class="col-md-4 col-6">
                {{ form.week }}
            </div>
            <div class="col-md-4 col-3">
                Kérdések száma: {{ form.questions.length }}
            </div>
            <div class="col-md-4 col-3 text-end">
                <font-awesome-icon icon="edit" class="fa-icon mx-4"/>
                <font-awesome-icon icon="trash" class="fa-icon"/>
            </div>
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
    },
};
</script>
