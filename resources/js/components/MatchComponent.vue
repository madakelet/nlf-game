<template>
    <div class="container my-4">
        <div class="row justify-content-center text-center">
            {{ match.start_time }} @ {{ match.stadium }}
        </div>
        <div class="row match-component py-2">
            <div class="col-lg-1 col-3 my-auto text-center">
                <img :src="match.home_team.logo_url" class="img-fluid" />
            </div>
            <div class="col-lg-4 col-9 my-auto text-center">
                <div class="team-name">
                    {{ match.home_team.name }}
                </div>
                <small>
                    {{ match.home_team.group }}
                </small>
            </div>
            <div class="col-lg-2 col-12 my-lg-auto my-2 text-center score">
                {{ match.final_score }}
            </div>
            <div class="col-lg-4 col-9 my-auto text-center order-md-1 order-2">
                <div class="team-name">
                    {{ match.away_team.name }}
                </div>
                <small>
                    {{ match.away_team.group }}
                </small>
            </div>
            <div class="col-lg-1 col-3 my-auto text-center order-md-2 order-1">
                <img :src="match.away_team.logo_url" class="img-fluid" />
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted, ref } from "vue";

export default {
    name: "MatchComponent",
    props: {
        match: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        onMounted(() => {});
        return {};
    },
};
</script>
