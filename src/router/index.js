import { createRouter, createWebHistory } from "vue-router";
import HomePage from "@/views/HomePage.vue";
import Page from "@/views/Page.vue"; // Import the Page1 component
import Section from "@/views/Section.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      redirect:"/page/1",
      component: HomePage,
      children: [
        {
          path: "page/:pageNumber",
          component: Page,
          children: [
            {
              path: "section/:secNumber",
              component: Section,
            }
          ]
        },
      ],
    },
  ],
});

export default router;
