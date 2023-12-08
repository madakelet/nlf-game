<template>
    <div class="mb-3">
        <select
            class="form-select"
            v-model="selectedTeamId"
            @change="handleSelectChange"
        >
            <option selected>Válassz csapatot</option>
            <option v-for="team in teams" :key="team.id" :value="team.id">
                {{ team.name }}
            </option>
        </select>
        <span></span>
    </div>
</template>
<script>
import { onMounted, watch, ref } from "vue";
import useTeam from "../composables/team";
export default {
    name: "SelectTeamComponent",
    props: {
        team_id: {
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedTeamId = ref(props.team_id);
        const { teams, load } = useTeam();
        onMounted(async () => {
            await load();
        });
        watch(() => props.team_id, 
        (newValue) => {
            selectedTeamId.value = newValue
        })
        const handleSelectChange = () => {
            emit("update:modelValue", selectedTeamId.value);
        };
        return {
            selectedTeamId,
            teams,
            handleSelectChange
        };
    },
};
</script>
