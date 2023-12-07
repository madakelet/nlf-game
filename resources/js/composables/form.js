import { ref } from "vue";
import axios from "axios";
import useDefault from "./default";
export default function useForm() {
    const errors = ref([]);
    const loading = ref(false);
    const forms = ref([]);
    const form = ref({});
    const { toggleLoadingClass, route } = useDefault();

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
    const getForm = async () => {
        loading.value = true;
        errors.value = [];
        toggleLoadingClass(loading.value);
        try {
            const response = await axios.get("/api/form", {
                params: {
                    id: route.params.id,
                },
            });
            form.value = response.data;
        } catch (err) {
            errors.value = err.response.data.errors;
        } finally {
            loading.value = false;
            toggleLoadingClass(loading.value);
        }
    };
    return {
        errors,
        loading,
        forms,
        form,
        getForms,
        getForm,
    };
}
