import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '@/views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import CreateAccountView from '@/views/CreateAccountView.vue'
import CreatePostView from '@/views/CreatePostView.vue'
import PostDetailsView from '@/views/PostDetailsView.vue'
import PostsView from '@/views/PostsView.vue'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/criar-conta',
    name: 'create-account',
    component: CreateAccountView
  },
  {
    path: '/criar-post',
    name: 'create-post',
    component: CreatePostView
  },
  {
    path: '/post',
    name: 'ver-post',
    component: PostDetailsView
  },
  {
    path: '/posts',
    name: 'posts',
    component: PostsView
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
