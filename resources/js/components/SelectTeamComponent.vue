<template>
    <div class="mb-3">
        <label class="form-label">
            csapat
            <span>
                <img
                    v-if="selectedTeamId"
                    :src="teams[selectedTeamId - 1].logo_url"
                    class="img-fluid"
                    width="40px"
            /></span>
        </label>
        <select
            class="form-select"
            v-model="selectedTeamId"
            @change="handleSelectChange"
        >
            <option v-for="team in teams" :key="team.id" :value="team.id">
                {{ team.name }}
            </option>
        </select>
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
        watch(
            () => props.team_id,
            (newValue) => {
                selectedTeamId.value = newValue;
            }
        );
        const handleSelectChange = () => {
            emit("update:modelValue", selectedTeamId.value);
        };
        return {
            selectedTeamId,
            teams,
            handleSelectChange,
        };
    },
};
</script>
