<template>
    <div class="mb-3">
        <label class="form-label">
            kérdés típus
        </label>
        <select
            class="form-select"
            v-model="select"
            @change="handleSelectChange"
        >
            <option v-for="question_type in questionTypes" :key="question_type.id" :value="question_type.id">
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
        question_type_id: {
            required: true,
        },
    },
    setup(props, { emit }) {
        const selectedQuestionTypeId = ref(props.question_type_id);
        const { questionTypes, loadQuestionTypes } = useQuestion();
        
        onMounted(async () => {
            await loadQuestionTypes();
        });
        watch(
            () => props.question_type_id,
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
}
</script>