<template>
    <div class="mb-3">
        <label class="form-label"
            >meccs
            <span v-if="selectedMatch.home_team && selectedMatch.away_team" class="ms-2">
                <img
                    :src="selectedMatch.home_team.logo_url"
                    class="img-fluid"
                    width="20px"
                />
                vs
                <img
                    :src="selectedMatch.away_team.logo_url"
                    class="img-fluid"
                    width="20px"
                />
            </span>
        </label>
        <select
            class="form-select"
            v-model="selectedMatch"
            @change="handleSelectChange"
            v-if="matches && matches.length"
        >
            <option value="" disabled selected>válassz meccset</option>
            <option v-for="match in matches" :key="match.id" :value="match">
                {{ match.home_team.name }} vs {{ match.away_team.name }}
            </option>
        </select>
    </div>
</template>
<script>
import { ref, watch } from "vue";
export default {
    name: "SelectMatchComponent",
    props: {
        matches: {
            type: Array,
            required: true,
        },
        currentMatch: {
            type: [Object, String, Array],
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedMatch = ref(props.currentMatch);
        watch(
            () => props.currentMatch,
            (newValue) => {
                selectedMatch.value = newValue;
            }
        );

        const handleSelectChange = () => {
            emit("update:modelValue", selectedMatch.value);
        };

        return {
            selectedMatch,
            handleSelectChange,
        };
    },
};
</script>
