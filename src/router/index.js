import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/Content.vue' // (បើមាន)

// 💡 ចំណុចសំខាន់៖ ត្រូវប្រាកដថាមានបន្ទាត់ Import នេះ និងសរសេរផ្លូវទៅកាន់ឯកសារឱ្យត្រូវ
import Content from '../views/Content.vue' 
import Explore from '../views/Explore.vue'
import FAQ from '../views/FAQ.vue'
import RequestDrama from '../views/RequestDrama.vue'

const routes = [
  {
    path: '/',
    name: 'content',
    component: Content // កន្លែងដែលបងហៅប្រើ ទើបវាទាមទារការ Import ខាងលើ
  },
  {
    path: '/explore',
    name: 'explore',
    component: Explore
  },
  {
    path: '/faq',
    name: 'faq',
    component: FAQ
  },
  {
    path: '/request',
    name: 'request',
    component: RequestDrama
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router