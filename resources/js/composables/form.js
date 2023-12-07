import { ref } from "vue";
import axios from "axios";
import useDefault from "./default";
export default function useForm() {
    const errors = ref([]);
    const loading = ref(false);
    const forms = ref([]);
    const { toggleLoadingClass } = useDefault();
    
    const getForms = async () => {
        loading.value = true;
        toggleLoadingClass(loading.value);
        try {
            const response = await axios.get("/api/forms");
            forms.value = response.data;
        } catch (err) {
            this.errors.value = err.response.data.errors;
        } finally {
            loading.value = false;
            toggleLoadingClass(loading.value);
        }
    };

    return {
        errors,
        loading,
        forms,
        getForms,
    };
}
