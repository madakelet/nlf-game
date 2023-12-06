import { createRouter, createWebHistory } from "vue-router";
import authRoutes from "./authRoutes";
import defaultRoutes from "./defaultRoutes";
import adminRoutes from "./adminRoutes";

const router = createRouter({
    history: createWebHistory(),
    routes: [...authRoutes, ...defaultRoutes, ...adminRoutes],
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            const el = window.location.href.split("#")[1];
            if (el.length) {
                document
                    .getElementById(el)
                    .scrollIntoView({ behavior: "smooth", block: "center" });
            }
        } else if (savedPosition) {
            return savedPosition;
        } else {
            document
                .getElementById("app")
                .scrollIntoView({ behavior: "smooth" });
        }
    },
});

export default router;
