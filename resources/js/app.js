import "./bootstrap";
import { createApp } from "vue";
import router from "./router/router";
import App from "./App.vue";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
library.add(fab, fas, far);

import LoadingSpinner from "./components/LoadingSpinner.vue";
import HeaderComponent from "./components/HeaderComponent.vue"
import FormComponent from "./components/FormComponent.vue"

const app = createApp({
    extends: App,
});
app.component("font-awesome-icon", FontAwesomeIcon)
    .component("loading-spinner", LoadingSpinner)
    .component("header-component", HeaderComponent)
    .component("form-component", FormComponent)
    .use(router)
    .mount("#app");
