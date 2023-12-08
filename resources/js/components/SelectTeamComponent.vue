<template>
    <div class="mb-3">
        <select
            class="form-select"
            aria-label="Default select example"
        >
            <option selected>Válassz csapatot</option>
            <option
                v-for="team in teams"
                :key="team.id"
                :value="team.id"
                >{{ team.name }} <img :src="team.logo_url" alt=""></option
            >
        </select>
    </div>
</template>
<script>
import { onMounted } from "vue";
import useTeam from "../composables/team";
export default {
    name: "SelectTeamComponent",
    props: {
    },
    setup() {
        const { teams, load } = useTeam();
        onMounted(async () => {
            await load();
        });
        return {
            teams,
        };
    }
}
</script>