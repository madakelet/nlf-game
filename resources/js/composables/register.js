import { ref } from "vue";
import useDefault from "./default";
import axios from "axios";
import { names } from "../helpers/nflNames";

export default function useRegister() {
    const { route } = useDefault();
    const errors = ref([]);
    const loading = ref(false);
    const form = ref({
        token: route.query.token,
    });
    const placeHolderRandomName = ref("");

    const register = async () => {
        loading.value = true;
        try {
            await axios.post(('/api/register'), form.value);
            window.location.href = route("home");
        } catch (e) {
            addShakeToRegister();
            errors.value = e.response.data.errors;
        } finally {
            loading.value = false;
        }
    }; 

    const randomName = () => {
        const randomIndex = Math.floor(Math.random() * names.length);
        placeHolderRandomName.value = names[randomIndex].name;
    };

    const addShakeToRegister = () => {
        const register = document.querySelector(".register-form");
        register.classList.add("shake-element");
        //register.classList.remove("shake-element");
    }

    return {
        errors,
        loading,
        form,
        route,
        placeHolderRandomName,
        register,
        randomName,
    };
}
