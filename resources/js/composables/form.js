import { ref } from "vue";
import axios from "axios";
import useDefault from "./default";
export default function useForm() {
    const errors = ref([]);
    const loading = ref(false);
    const forms = ref([]);
    const form = ref({
        week: "",
        questions: [],
    });
    const { toggleLoadingClass, route, router } = useDefault();

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

    const addQuestionToArray = () => {
        const question = {
            id: generateId(),
            question: "",
        };

        form.value.questions.push(question);
    };

    const removeQuestionFromArray = (question) => {
        const index = form.value.questions.indexOf(question);
        form.value.questions.splice(index, 1);
    };

    const generateId = () => {
        return Date.now() + Math.floor(Math.random() * 1000);
    };

    const createForm = async () => {
        if (
            confirm(
                `Biztosan létre akarod hozni a formot? Jelenlegi kérdések száma: ${form.value.questions.length}. (Később szerkeszthető lesz a form ha valamit rosszul adtál meg.)`
            )
        ) {
            loading.value = true;
            errors.value = [];
            try {
                const response = await axios.post("/api/form", form.value);
                router.push({ name: "EditForm", params: { id: response.data.id } });
            } catch (err) {
                errors.value = err.response.data.errors;
            } finally {
                loading.value = false;
            }
        }
    };
    return {
        errors,
        loading,
        forms,
        form,
        getForms,
        getForm,
        addQuestionToArray,
        removeQuestionFromArray,
        createForm,
    };
}
