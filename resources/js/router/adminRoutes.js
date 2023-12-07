export default [
    {
        path: "/users",
        name: "Users",
        meta: { layout: "auth", requiresAdmin: true },
        component: () => import("../pages/Admin/Users.vue"),
    },
    {
        path: "/forms",
        name: "Forms",
        meta: { layout: "auth", requiresAdmin: true },
        component: () => import("../pages/Admin/Forms.vue"),
    },
    {
        path: "/form/:id/edit",
        name: "EditForm",
        meta: { layout: "auth", requiresAdmin: true },
        component: () => import("../pages/Admin/EditForm.vue"),
    },
];
