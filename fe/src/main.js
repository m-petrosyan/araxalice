import {createApp} from 'vue'
import App from '@/App.vue'
import router from '@/router'
import store from "@/store";
import MediumEditor from 'vuejs-medium-editor'
import '@/assets/styles/main.scss'
import VueGtag from "vue-gtag-next";
import "medium-editor/dist/css/medium-editor.css";
import 'highlight.js/styles/github.css';

const app = createApp(App)

app.use(router)
    .use(VueGtag, {property: {id: "GA_MEASUREMENT_ID"}})
    .use(store)
    .component('medium-editor', MediumEditor)
    .mount('#app')
