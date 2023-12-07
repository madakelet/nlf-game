import { ref } from "vue";
import axios from "axios";
export default function useForm() {
    const errors = ref([]);
    const loading = ref(false);
    const forms = ref([]);

    const getForms = async () => {
        loading.value = true;
        try {
            const response = await axios.get("/api/forms");
            forms.value = response.data;
        } catch (err) {
            this.errors.value = err.response.data.errors;
        } finally {
            loading.value = false;
        }
    };

    return {
        errors,
        loading,
        forms,
        getForms,
    };
}
