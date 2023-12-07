<template>
    <div class="row match-component my-4">
        <div class="col-1 my-auto text-center">
            <img :src="match.home_team.logo_url" class="img-fluid" />
        </div>
        <div class="col-4 my-auto text-center">
            <div class="team-name">
                {{ match.home_team.name }}
            </div>
            <small>
                {{ match.home_team.group }}
            </small>
        </div>
        <div class="col-2 my-auto text-center">
            {{ match.final_score }}
        </div>
        <div class="col-4 my-auto text-center">
            <div class="team-name">
                {{ match.away_team.name }}
            </div>
            <small>
                {{ match.away_team.group }}
            </small>
        </div>
        <div class="col-1 my-auto text-center">
            <img :src="match.away_team.logo_url" class="img-fluid" />
        </div>
    </div>
</template>
<script>
export default {
    name: "MatchComponent",
    props: {
        match: {
            type: Object,
            required: true,
        },
    },
};
</script>
