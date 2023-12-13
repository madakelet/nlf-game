<template>
    <div class="create-question p-3">
        <div class="row my-3">
            <div class="col-lg-8 col-10">
                <select-question-type-component
                    :currentQuestionTypeId="currentQuestionTypeId"
                    v-model="question.question_type_id"
                ></select-question-type-component>
            </div>
        </div>
        <div class="row mb-4" v-if="question.question_type_id != null">
            <div class="col-lg-8 col-10">
                <input-component 
                    label="kérdés"
                    type="text"
                    :hasLabel="true"
                    v-model="question.question"
                ></input-component>
            </div>
        </div>
        <div class="row" v-if="question.question_type_id != null && question.question_type_id != 3">
            <div class="col-lg-4 col-5">
                <label class="form-label">week</label>
                <select-week-component
                    :weeks="weeks"
                    :currentWeekId="currentWeekId"
                    v-model="question.week_id"
                ></select-week-component>
            </div>
            <div class="col-lg-4 col-5">
                <select-match-component
                    :matches="matches"
                    :currentMatch="currentMatch"
                    v-model="question.nfl_match_id"
                >
                    ></select-match-component
                >
            </div>
        </div>
        <div class="row justify-content-center">
            <slot></slot>
        </div>
    </div>
</template>
<script>
import useQuestion from "../../composables/question";
import useMatch from "../../composables/match";
import { onMounted, watch } from "vue";
export default {
    name: "CreateQuestionComponent",
    props: {
        question: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const {
            weeks,
            getWeeks,
            loading,
            getMatches,
            matches,
            currentWeekId,
            currentMatch,
        } = useMatch();
        const { loadQuestionTypes, questionTypes, currentQuestionTypeId } =
            useQuestion();
        onMounted(async () => {
            await getWeeks();
            await getMatches();
            await loadQuestionTypes();
        });
        watch(
            () => props.question.week_id,
            async () => {
                currentWeekId.value = props.question.week_id;
                await getMatches();
            }
        );
        watch(
            () => props.question.question_type_id,
            (newVal) => {
                if (newVal == 1) {
                    props.question.question = "Ki nyeri a meccset?";
                } else if (newVal == 2) {
                    props.question.question = "Mi lesz a meccs pontos végeredménye? (pl: 42-11)";
                } else if (newVal == 3) {
                    props.question.question = "Legkevesebbet pontot szerző csapat";
                } else if(newVal == 4) {
                    props.question.question = "";
                }
            }
        );
        return {
            weeks,
            loading,
            matches,
            questionTypes,
            currentWeekId,
            currentMatch,
            currentQuestionTypeId,
            getWeeks,
            getMatches,
        };
    },
};
</script>
