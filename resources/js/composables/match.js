import { ref } from "vue";
import axios from "axios";
export default function useMatch() {
    const errors = ref([]);
    const loading = ref(false);
    const matches = ref([]);
    const body = document.body;
    const html = document.documentElement;
    const weeks = ref([]);
    const currentWeek = ref("");
    const getMatches = async () => {
        loading.value = true;
        toggleLoadingClass();
        try {
            const response = await axios.get("/api/matches", {
                params: {
                    week: currentWeek.value
                }
            });
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
    const getWeeks = async () => {
        loading.value = true;
        toggleLoadingClass();
        try {
            const response = await axios.get("/api/weeks");
            weeks.value = response.data;
            currentWeek.value = response.data[0].week;
        } catch (err) {
            this.errors.value = err.response.data;
        } finally {
            loading.value = false;
            toggleLoadingClass();
        }
    };
    return {
        errors,
        loading,
        matches,
        weeks,
        currentWeek,
        getMatches,
        getWeeks
    };
}
