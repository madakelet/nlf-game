<template>
    <div class="mb-3">
        <select
            class="form-select"
            v-model="selectedWeek"
            @change="handleSelectChange"
            v-if="weeks && weeks.length"
        >
            <option
                v-for="week in weeks"
                :key="week.id"
                :selected="week.is_current"
                :value="week.week"
            >
                {{ week.week }} <span v-if="week.is_current"> (current)</span>
            </option>
        </select>
    </div>
</template>
<script>
import { watch, ref } from "vue";
export default {
    name: "SelectWeekComponent",
    props: {
        weeks: {
            type: Array,
            required: true,
        },
        currentWeek: {
            type: String,
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedWeek = ref(props.currentWeek);

        watch(
            () => props.currentWeek,
            (newValue) => {
                selectedWeek.value = newValue;
            }
        );

        const handleSelectChange = () => {
            emit("update:modelValue", selectedWeek.value);
        };

        return {
            selectedWeek,
            handleSelectChange,
        };
    },
};
</script>
