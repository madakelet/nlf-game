import './bootstrap';
import { createApp } from 'vue';
import router from './router/router';
import App from './App.vue';

const app = createApp({
    extends: App,
});
app
    .use(router)
    .mount('#app');
