<template>
    <div class="row">
        <div class="col-2">
            img1
        </div>
        <div class="col-3">
            team1
        </div>
        <div class="col-1">
            score1
        </div>
        <div class="col-1">
            score2
        </div>
        <div class="col-3">
            team2
        </div>
        <div class="col-2">
            img2
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
    }
}
</script>