import './assets/main.css'
import { createRouter,createWebHistory } from 'vue-router'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import register from './components/register.vue'
import login from './components/login.vue'
import Home from './views/Home.vue'
const pinia = createPinia()
const routes = [
    {path :'/register',component:register},
    {path :'/login',component:login},
    {path :'/',component:Home},
]

const router = createRouter({
    history:createWebHistory(),
    routes:routes
})
createApp(App).use(pinia).use(router).mount('#app')
