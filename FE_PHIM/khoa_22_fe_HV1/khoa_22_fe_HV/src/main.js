import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Default from './layout/wrapper/index.vue'
import Client from './layout/wrapper/client.vue'
import VCalendar from 'v-calendar';
import 'v-calendar/style.css';
import Toaster from "@meforma/vue-toaster"


const app = createApp(App)

app.use(router)
app.use(VCalendar, {})
app.use(Toaster, {
  position: "top-right"
});
app.component("default-layout", Default);
app.component("client-layout", Client);

app.mount("#app")