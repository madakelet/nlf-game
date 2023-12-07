import { ref } from "vue";
import { useRouter } from "vue-router";
export default function useDefault() {
    const baseUrl = ref(window.location.origin);
    const router = useRouter();
    const body = document.body;
    const html = document.documentElement;

    const redirect = (pathName, id) => {
        router.push({ name: pathName, params: { id } });
    };
    const toggleLoadingClass = (loading) => {
        if (loading) {
            body.classList.add("loading");
            html.classList.add("loading");
        } else {
            body.classList.remove("loading");
            html.classList.remove("loading");
        }
    };
    return {
        baseUrl,
        router,
        redirect,
        toggleLoadingClass,
    };
}
