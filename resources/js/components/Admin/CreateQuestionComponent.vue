<template>
    <div class="create-question">
        <div class="row">
            <div class="col-lg-4 col-5">
                <select-week-component
                    :weeks="weeks"
                    :currentWeekId="currentWeekId"
                    v-model="question.week_id"
                ></select-week-component>
            </div>
            <div class="col-lg-4 col-5">
                <select-match-component
                    :matches="matches"
                    :currentMatchId="currentMatchId"
                    v-model="question.match_id"
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
import { onMounted } from "vue";
export default {
    name: "CreateQuestionComponent",
    props: {
        question: {
            type: Object,
            required: true,
        },
    },
    setup() {
        const {
            weeks,
            getWeeks,
            loading,
            getMatches,
            matches,
            currentWeekId,
            currentMatchId,
        } = useMatch();
        onMounted(async () => {
            await getWeeks();
            await getMatches();
        });
        return {
            weeks,
            getWeeks,
            loading,
            getMatches,
            matches,
            currentWeekId,
            currentMatchId,
        };
    },
};
</script>
