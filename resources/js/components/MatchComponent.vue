<template>
    <div class="container my-4">
        <div class="row justify-content-center">
            {{ match.start_time }} @ {{ match.stadium }}
        </div>
        <div class="row match-component py-2">
            <div class="col-1 my-auto text-center">
                <img :src="match.home_team.logo_url" class="img-fluid" v-if="imagesLoaded"/>
                <loading-spinner v-else />
            </div>
            <div class="col-4 my-auto text-center">
                <div class="team-name">
                    {{ match.home_team.name }}
                </div>
                <small>
                    {{ match.home_team.group }}
                </small>
            </div>
            <div class="col-2 my-auto text-center score">
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
                <img :src="match.away_team.logo_url" class="img-fluid" v-if="imagesLoaded"/>
                <loading-spinner v-else />
            </div>
        </div>
    </div>
</template>
<script>
import { onMounted, ref } from 'vue';

export default {
    name: "MatchComponent",
    props: {
        match: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const imagesLoaded = ref(false);
        const checkIfImagesLoaded = () => {
            const imgHome = new Image();
            imgHome.src = props.match.home_team.logo_url;
            const imgAway = new Image();
            imgAway.src = props.match.away_team.logo_url;
            imgHome.onload = () => {
                imgAway.onload = () => {
                    console.log("loaded");
                    imagesLoaded.value = true;
                };
            };
        };

        onMounted(() => {
            checkIfImagesLoaded();
        });
        return {
            imagesLoaded,
        };
    },
};
</script>
