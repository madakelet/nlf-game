import { ref } from "vue";
import axios from "axios";
export default function useMatch() {
    const errors = ref([]);
    const loading = ref(false);
    const matches = ref([]);
    const body = document.body;
    const html = document.documentElement;
    const getMatches = async () => {
        loading.value = true;
        toggleLoadingClass();
        try {
            const response = await axios.get("/api/matches");
            matches.value = response.data;
        } catch (err) {
            this.errors.value = err.response.data.errors;
        } finally {
            loading.value = false;
            toggleLoadingClass();
        }
    };
    const toggleLoadingClass = () => {
        if (loading.value) {
            body.classList.add("loading");
            html.classList.add("loading");
        } else {
            body.classList.remove("loading");
            html.classList.remove("loading");
        }
    };
    return {
        errors,
        loading,
        matches,
        getMatches,
    };
}
