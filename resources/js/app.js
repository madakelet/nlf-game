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
import FormListComponent from "./components/FormListComponent.vue"
import MatchComponent from "./components/MatchComponent.vue"
import EditQuestionComponent from "./components/EditQuestionComponent.vue"
import InputComponent from "./components/InputComponent.vue"
import SelectWeekComponent from "./components/SelectWeekComponent.vue"
import SelectTeamComponent from "./components/SelectTeamComponent.vue"
import SelectMatchComponent from "./components/SelectMatchComponent.vue"
import SelectQuestionTypeComponent from "./components/SelectQuestionTypeComponent.vue"
import ErrorComponent from "./components/ErrorComponent.vue"
import AlertComponent from "./components/AlertComponent.vue"
import CreateQuestionComponent from "./components/Admin/CreateQuestionComponent.vue"
import TableComponent from "./components/TableComponent.vue"

const app = createApp({
    extends: App,
});
app.component("font-awesome-icon", FontAwesomeIcon)
    .component("loading-spinner", LoadingSpinner)
    .component("header-component", HeaderComponent)
    .component("form-component", FormListComponent)
    .component("match-component", MatchComponent)
    .component("edit-question-component", EditQuestionComponent)
    .component("input-component", InputComponent)
    .component("select-week-component", SelectWeekComponent)
    .component("select-team-component", SelectTeamComponent)
    .component("select-match-component", SelectMatchComponent)
    .component("select-question-type-component", SelectQuestionTypeComponent)
    .component("error-component", ErrorComponent)
    .component("alert-component", AlertComponent)
    .component("create-question-component", CreateQuestionComponent)
    .component("table-component", TableComponent)
    .use(router)
    .mount("#app");
