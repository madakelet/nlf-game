export default [
    {
        path: "/",
        name: "LoginPage",
        meta: { layout: "default" },
        component: () => import("../pages/Default/LoginPage.vue"),
    },
    {
        path: "/register",
        name: "RegisteerPage",
        meta: { layout: "default" },
        component: () => import("../pages/Default/RegisterPage.vue"),
    },
];
