import { ref } from 'vue'
import axios from 'axios'

export default function useTeam() {
    const teams = ref([])
    const error = ref(null)

    const load = async () => {
        try {
            const response = await axios.get('/api/teams')
            teams.value = response.data
        } catch (err) {
            error.value = err.message
        }
    }

    return { teams, error, load }
}