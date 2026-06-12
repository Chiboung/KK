import { createApp } from 'vue'
import App from './App.vue'
import router from './router' // ត្រូវប្រាកដថាមានបន្ទាត់នេះ
import './style.css'

const app = createApp(App)

app.use(router) // ត្រូវប្រាកដថាមានបន្ទាត់នេះដើម្បីឱ្យ Router ដើរ

app.mount('#app')