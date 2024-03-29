import Vue from "vue";
import VueRouter from "vue-router";
import store from "@/store";

import HomeView from "@/views/HomeView.vue";
import LoginView from "@/views/LoginView.vue";
import CreateAccountView from "@/views/CreateAccountView.vue";
import CreatePostView from "@/views/CreatePostView.vue";
import PostDetailsView from "@/views/PostDetailsView.vue";
import ProfileView from "@/views/ProfileView.vue";
import PostsView from "@/views/PostsView.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
  },
  {
    path: "/criar-conta",
    name: "create-account",
    component: CreateAccountView,
  },
  {
    path: "/criar-post",
    name: "create-post",
    component: CreatePostView,
  },
  {
    path: "/post/:id",
    name: "ver-post",
    component: PostDetailsView,
  },
  {
    path: "/perfil/:id",
    name: "perfil",
    component: ProfileView,
  },
  {
    path: "/posts",
    name: "posts",
    component: PostsView,
  },
  {
    // se a página não existe, redireciona para a home (deve ser o último)
    path: "/:pathMatch(.*)*",
    redirect: { name: "home" },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  if (
    !store.getters.isAuthenticated &&
    !(to.name === "login" || to.name === "home" || to.name === "create-account")
  ) {
    next({ name: "login" });
  } else {
    next();
  }
});

export default router;
