import { ref } from "vue";
import { useRouter } from "vue-router";
export default function useDefault() {
    const baseUrl = ref(window.location.origin);
    const router = useRouter();
    const redirect = (pathName, id) => {
        router.push({ name: pathName, params: { id } });
    };
    return {
        baseUrl,
        router,
        redirect
    };
}