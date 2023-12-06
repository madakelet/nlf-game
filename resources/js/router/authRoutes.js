export default [
    {
        path: "/dashboard",
        name: "DashBoard",
        meta: { layout: "auth", requiresAuth: true },
        component: () => import("../pages/Auth/DashBoard.vue"),
    }
];