<template>
    <div class="container my-2">
        <div class="row form-component p-2">
            <div class="col-md-4 col-3 my-auto">
                {{ form.week }}
            </div>
            <div class="col-md-4 col-6 my-auto">
                Kérdések száma: {{ form.questions.length }}
            </div>
            <div class="col-md-4 col-3 text-end my-auto">
                <font-awesome-icon
                    icon="edit"
                    class="fa-icon mx-md-4 mx-3"
                    @click="redirect('EditForm', form.id)"
                />
                <font-awesome-icon icon="trash" class="fa-icon" />
            </div>
        </div>
    </div>
</template>
<script>
import useDefault from "../composables/default";
export default {
    name: "FormListComponent",
    props: {
        form: {
            type: Object,
            required: true,
        },
    },
    setup() {
        const { redirect } = useDefault();
        return {
            redirect,
        };
    },
};
</script>
