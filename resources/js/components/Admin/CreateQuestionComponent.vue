<template>
    <div class="create-question p-3">
        <div class="row my-3">
            <select-question-type-component
                :currentQuestionTypeId="currentQuestionTypeId"
                v-model="question.question_type_id"
            ></select-question-type-component>
        </div>
        <div class="row">
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
                    v-model="question.match"
                >
                    ></select-match-component
                >
            </div>
            <div class="col-1 my-auto">
                <slot></slot>
            </div>
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
        const { loadQuestionTypes, questionTypes, currentQuestionTypeId } = useQuestion();
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
