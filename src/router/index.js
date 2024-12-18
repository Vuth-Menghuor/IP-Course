import CategoryView from "@/views/CategoryView.vue";
import HomeView from "@/views/HomeView.vue";
import { createRouter, createWebHistory } from "vue-router";
import ProductView from "../views/ProductView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeView, // Default home route
        },
        {
            path: "/categories",
            name: "categories",
            component: CategoryView,
        },
        {
            path: "/categories/:categoryTitle",
            name: "category",
            component: CategoryView,
            props: true,
        },
        {
            path: "/products/:productId",
            name: "product",
            component: ProductView,
            props: true,
        },
    ],
});

export default router;
