<template>
    <div class="container p-2">
        <div class="row justify-content-center">
            <div class="col-8 form-title">
               {{ form.week }} 
            </div>
            <div
                class="col-lg-8 col-10"
                v-for="question in form.questions"
                :key="question.id"
            >
            <edit-question-component :question="question"></edit-question-component>
        </div>
        </div>
    </div>
</template>
<script>
import { onMounted } from "vue";
import useForm from "../../composables/form";
export default {
    name: "EditForm",
    setup() {
        const { form, loading, errors, getForm } = useForm();
        onMounted(async () => {
            await getForm();
        });
        return {
            form,
            errors,
            loading,
        };
    },
};
</script>
