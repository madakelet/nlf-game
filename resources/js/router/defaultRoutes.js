export default [
    {
        path: "/",
        name: "LoginPage",
        meta: { layout: "default" },
        component: () => import("../pages/Default/LoginPage.vue"),
    },
];
