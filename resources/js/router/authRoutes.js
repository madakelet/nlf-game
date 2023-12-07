export default [
    {
        path: "/dashboard",
        name: "DashBoard",
        meta: { layout: "auth", requiresAuth: true },
        component: () => import("../pages/Auth/DashBoard.vue"),
    },
    {
        path: "/tips",
        name: "MyTips",
        meta: { layout: "auth", requiresAuth: true },
        component: () => import("../pages/Auth/MyTips.vue"),
    },
    {
        path: "/profile",
        name: "ProfilePage",
        meta: { layout: "auth", requiresAuth: true },
        component: () => import("../pages/Auth/ProfilePage.vue"),
    }
];