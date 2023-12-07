import { ref } from "vue";
import axios from "axios";
export default function useMatch() {
    const errors = ref([]);
    const loading = ref(false);
    const matches = ref([]);
    const body = document.body;
    const html = document.documentElement;
    const weeks = [
        "Week 1",
        "Week 2",
        "Week 3",
        "Week 4",
        "Week 5",
        "Week 6",
        "Week 7",
        "Week 8",
        "Week 9",
        "Week 10",
        "Week 11",
        "Week 12",
        "Week 13",
        "Week 14",
        "Week 15",
        "Week 16",
        "Week 17",
        "Week 18",
    ];
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
