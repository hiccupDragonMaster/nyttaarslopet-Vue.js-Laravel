import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router.js'
import { Col, Row, Dialog } from 'vant';

const app = createApp(App)

app.use(router)
app.use(Col)
app.use(Row)
app.use(Dialog)

app.mount('#app')
