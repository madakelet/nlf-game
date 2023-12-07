<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12" align="center" v-if="loading">
                <loading-spinner />
            </div>
            <div class="col-lg-10 col-12" v-if="!loading">
                <div class="mb-3">
                    <label class="form-label">Week</label>
                    <select class="form-select">
                        <option value="">New Delhi</option>
                        <option value="">Istanbul</option>
                        <option value="">Jakarta</option>
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
import { onMounted } from "vue";
import useMatch from "../../composables/match";
export default {
    name: "DashBoard",
    setup() {
        const { matches, getMatches, loading, erros } = useMatch();
        onMounted(async () => {
            await getMatches();
        });
        return {
            matches,
            loading,
            erros,
            getMatches,
        };
    },
};
</script>
