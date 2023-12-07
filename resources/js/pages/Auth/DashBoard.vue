<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12" align="center" v-if="loading">
                <loading-spinner />
            </div>
            <div class="col-lg-10 col-12" v-if="!loading">
                <div class="mb-3">
                    <select class="form-select" v-model="currentWeek">
                        <option
                            v-for="week in weeks"
                            :key="week.id"
                            :selected="week.is_current"
                            :value="week.week"
                        >
                            {{ week.week }} <span v-if="week.is_current"> (current)</span>
                        </option>
                    </select>
                </div>
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
            currentWeek,
            getMatches,
            getWeeks,
        } = useMatch();
        onMounted(async () => {
            await getWeeks();
            await getMatches();
        });
        watch(currentWeek, async () => {
            await getMatches();
        });
        return {
            matches,
            loading,
            erros,
            weeks,
            currentWeek,
        };
    },
};
</script>
