<template>
    <section id="create-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-5">
                    <div class="fs-2">form készítés</div>
                </div>
                <div class="col-lg-2 col-5">
                    <button @click="addQuestionToArray">
                        új kérdés <font-awesome-icon icon="plus" />
                    </button>
                </div>
            </div>
            <div class="row mt-5 justify-content-center">
                <div
                    class="col-lg-10 col-12"
                    v-for="(question) in questions"
                    :key="question.id"
                >
                    <create-question-component :question="question">
                        <div class="col-lg-3 col-6 text-center">
                            <button class="danger-button" @click="removeQuestionFromArray(question)">
                                törlés
                            </button>
                        </div>
                    </create-question-component>
                </div>
            </div>
        </div>
    </section>
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
