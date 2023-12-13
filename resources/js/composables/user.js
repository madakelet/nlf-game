import { ref } from "vue";
import axios from "axios";

export default function useUser() {
    const errors = ref([]);
    const users = ref([]);
    const invitations = ref([]);
    const loading = ref(false);
    const email = ref("");
    const success = ref(false);
    const toggleSendInvitation = ref(false);

    const getUsers = async () => {
        loading.value = true;
        errors.value = [];
        try {
            const response = await axios.get("/api/users");
            users.value = response.data;
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    };

    const sendInvitation = async () => {
        loading.value = true;
        errors.value = [];
        try {
            await axios.post("/api/invitation", {
                email: email.value,
            });
            success.value = true;
            email.value = "";
            toggleSendInvitation.value = false;
            setTimeout(() => {
                success.value = false;
            }, 3000);
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    };

    const loadInvitations = async () => {
        loading.value = true;
        errors.value = [];
        try {
            const response = await axios.get("/api/invitations");
            invitations.value = response.data;
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    }
    return {
        errors,
        users,
        loading,
        email,
        toggleSendInvitation,
        success,
        invitations,
        loadInvitations,
        getUsers,
        sendInvitation,
    };
}
