<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-4">
                <div class="fs-2">form készítés</div>
            </div>
            <div class="col-lg-2 col-2">
                <button @click="addQuestionToArray">
                    <font-awesome-icon icon="plus" />
                </button>
            </div>
        </div>
        <div class="row">
            <div
                class="col-lg-6 col-10"
                v-for="(question) in questions"
                :key="question.id"
            >
                <create-question-component :question="question">
                    <font-awesome-icon icon="trash" class="fa-icon" @click="removeQuestionFromArray(question)"/>
                </create-question-component>
            </div>
        </div>
    </div>
</template>
<script>
import useForm from "../../composables/form";
export default {
    name: "CreateForm",
    setup() {
        const { questions, addQuestionToArray, removeQuestionFromArray } = useForm();
        return {
            questions,
            addQuestionToArray,
            removeQuestionFromArray,
        };
    },
};
</script>
