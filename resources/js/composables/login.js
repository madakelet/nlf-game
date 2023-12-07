import { ref } from "vue";
import { useRoute, useRouter } from "vue-router";
export default function useLogin() {
    const route = useRoute();
    const router = useRouter();
    const loading = ref(false);
    const errors = ref([]);
    const form = ref({});
    const isAdmin = ref(false);
    const login = async () => {
        loading.value = true;
        errors.value = [];
        try {
            await axios.get("/sanctum/csrf-cookie");
            await axios.post("/api/login", form.value);
            router.push({ name: "DashBoard" });
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    };

    const logout = async () => {
        loading.value = true;
        errors.value = [];
        try {
            await axios.post("/api/logout");
            router.push({ name: "LoginPage" });
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    };
    
    const  getIsAdmin = async () => {
        loading.value = true;
        errors.value = [];
        try {
            const response = await axios.get("/api/is-admin");
            isAdmin.value = response.data;
        } catch (e) {
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    } 
    return {
        loading,
        errors,
        form,
        isAdmin,
        login,
        logout, 
        getIsAdmin
    };
}
