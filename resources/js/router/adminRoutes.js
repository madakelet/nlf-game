export default [
    {
        path: "/users",
        name: "Users",
        meta: { layout: "auth", requiresAdmin: true },
        component: () => import("../pages/Admin/Users.vue"),
    },
];
