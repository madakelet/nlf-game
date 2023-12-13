import { ref } from "vue";
import axios from "axios";
export default function useMatch() {
    const errors = ref([]);
    const loading = ref(false);
    const matches = ref([]);
    const weeks = ref([]);
    const currentWeekId = ref("");
    const currentMatch = ref({});
    
    const getMatches = async () => {
        loading.value = true;
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
        }
    };

    const getWeeks = async () => {
        loading.value = true;
        try {
            const response = await axios.get("/api/weeks");
            weeks.value = response.data;
            currentWeekId.value = response.data[0].id;
        } catch (err) {
            this.errors.value = err.response.data;
        } finally {
            loading.value = false;
        }
    };
    return {
        errors,
        loading,
        matches,
        weeks,
        currentWeekId,
        currentMatch,
        getMatches,
        getWeeks,
    };
}
