import './bootstrap';
import { createApp } from 'vue';

import App from './App.vue';

const app = createApp({
    extends: App,
});
app.mount('#app');
