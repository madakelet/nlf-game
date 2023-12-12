<template>
    <div class="create-question p-3">
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

        onMounted(async () => {
            await getWeeks();
            await getMatches();
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
            getWeeks,
            loading,
            getMatches,
            matches,
            currentWeekId,
            currentMatch,
        };
    },
};
</script>
