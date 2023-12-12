<template>
    <div class="mb-3">
        <select
            class="form-select"
            v-model="selectedMatch"
            @change="handleSelectChange"
            v-if="matches && matches.length"
        >
            <option
                v-for="match in matches"
                :key="match.id"
                :value="match.id"
            >
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
        currentMatchId: {
            type: [String, Number],
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedMatch = ref(props.currentMatchId);

        watch(
            () => props.currentMatchId,
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
}
</script>