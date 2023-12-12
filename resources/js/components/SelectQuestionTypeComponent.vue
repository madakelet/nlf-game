<template>
    <div class="mb-3">
        <label class="form-label"> kérdés típus </label>
        <select
            class="form-select"
            v-model="selectedQuestionTypeId"
            @change="handleSelectChange"
        >
            <option value="" disabled selected>választás</option>
            <option
                v-for="question_type in questionTypes"
                :key="question_type.id"
                :value="question_type.id"
            >
                {{ question_type.description }}
            </option>
        </select>
    </div>
</template>
<script>
import { onMounted, watch, ref } from "vue";
import useQuestion from "../composables/question";
export default {
    name: "SelectQuestionTypeComponent",
    props: {
        currentQuestionTypeId: {
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedQuestionTypeId = ref(props.currentQuestionTypeId);
        const { questionTypes, loadQuestionTypes } = useQuestion();

        onMounted(async () => {
            await loadQuestionTypes();
        });
        watch(
            () => props.currentQuestionTypeId,
            (newValue) => {
                selectedQuestionTypeId.value = newValue;
            }
        );
        const handleSelectChange = () => {
            emit("update:modelValue", selectedQuestionTypeId.value);
        };
        return {
            selectedQuestionTypeId,
            questionTypes,
            handleSelectChange,
        };
    },
};
</script>
