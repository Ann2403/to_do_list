import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Axios from 'axios'

import './assets/main.css'

const app = createApp(App)

app.use(router)

app.mount('#app')

app.prototype.$http = Axios;
const token = 'Bearer ' + localStorage.getItem('token')
if (token) {
    app.prototype.$http.defaults.headers.common['Authorization'] = token
}
