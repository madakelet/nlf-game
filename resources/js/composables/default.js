import { ref } from "vue";
import { useRouter, useRoute } from "vue-router";
export default function useDefault() {
    const baseUrl = ref(window.location.origin);
    const router = useRouter();
    const route = useRoute();
    const body = document.body;
    const html = document.documentElement;

    const redirect = (pathName, id = null) => {
        if (id === null) router.push({ name: pathName });
        else router.push({ name: pathName, params: { id } });
    };
    return {
        baseUrl,
        router,
        route,
        redirect,
    };
}
