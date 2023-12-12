import { ref } from "vue";
import axios from "axios";
import useDefault from "./default";
export default function useMatch() {
    const errors = ref([]);
    const loading = ref(false);
    const matches = ref([]);
    const weeks = ref([]);
    const currentWeekId = ref("");
    const currentMatchId = ref("");
    const { toggleLoadingClass } = useDefault();
    
    const getMatches = async () => {
        loading.value = true;
        toggleLoadingClass(loading.value);
        try {
            const response = await axios.get("/api/matches", {
                params: {
                    week_id: currentWeekId.value,
                },
            });
            matches.value = response.data;
        } catch (err) {
            this.errors.value = err.response.data.errors;
        } finally {
            loading.value = false;
            toggleLoadingClass(loading.value);
        }
    };

    const getWeeks = async () => {
        loading.value = true;
        toggleLoadingClass(loading.value);
        try {
            const response = await axios.get("/api/weeks");
            weeks.value = response.data;
            currentWeekId.value = response.data[0].id;
        } catch (err) {
            this.errors.value = err.response.data;
        } finally {
            loading.value = false;
            toggleLoadingClass(loading.value);
        }
    };
    return {
        errors,
        loading,
        matches,
        weeks,
        currentWeekId,
        currentMatchId,
        getMatches,
        getWeeks,
    };
}
