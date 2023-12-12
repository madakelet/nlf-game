import { ref } from "vue";
import axios from "axios";
export default function useQuestion() {
    const questionTypes = ref([]);
    const loading = ref(false);
    const errors = ref([]);

    const loadQuestionTypes = async () => {
        loading.value = true;
        try {
            const response = await axios.get("/api/question-types");
            questionTypes.value = response.data;
        } catch (error) {
            errors.value = error.response.data.errors;
        } finally {
            loading.value = false;
        }
    }

    return {
        questionTypes,
        loading,
        errors,
        loadQuestionTypes
    }
}