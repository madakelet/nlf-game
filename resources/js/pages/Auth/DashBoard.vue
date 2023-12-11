<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12" align="center" v-if="loading">
                <loading-spinner />
            </div>
            <select-week-component
                v-model="currentWeekId"
                :weeks="weeks"
                :currentWeekId.sync="currentWeekId"
            />
            <div class="col-lg-10 col-12" v-if="!loading">
                <match-component
                    v-for="match in matches"
                    :key="match.id"
                    :match="match"
                />
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted, watch } from "vue";
import useMatch from "../../composables/match";
export default {
    name: "DashBoard",
    setup() {
        const {
            weeks,
            matches,
            loading,
            erros,
            currentWeekId,
            getMatches,
            getWeeks,
        } = useMatch();
        onMounted(async () => {
            await getWeeks();
            await getMatches();
        });
        watch(currentWeekId, async (newVal, oldVal) => {
            if (oldVal != "") await getMatches();
        });
        return {
            matches,
            loading,
            erros,
            weeks,
            currentWeekId,
        };
    },
};
</script>
