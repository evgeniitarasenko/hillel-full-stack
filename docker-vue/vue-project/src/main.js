import "./../node_modules/bootstrap/scss/bootstrap.scss";
import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue' // Імпорт корневого елемента (компонента)

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.mount('#app')
