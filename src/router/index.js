import { createRouter, createWebHistory } from "vue-router";
import HomePage from "@/views/HomePage.vue";
import Page1 from "@/views/Page1.vue"; // Import the Page1 component

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomePage,
    },
    {
      path: "/page1", 
      name: "page1",
      component: Page1,
    },
    {
      path: "/page2",
      name: "page2",
      component: () => import("@/views/Page2.vue"),
    },
    {
      path: "/page3",
      name: "page3",
      component: () => import("@/views/Page3.vue"), 
    },
  ],
});

export default router;
