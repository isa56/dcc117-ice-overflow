import Vue from "vue";
import App from "@/App.vue";
import router from "@/router";
import store from "@/store";
import vuetify from "@/plugins/vuetify";
import axios from "axios";

import "@/assets/css/tailwind.css";
import "@/assets/css/fonts.css";

Vue.config.productionTip = false;

if (store.getters.isAuthenticated) {
  Vue.prototype.$auth_token = store.getters.getAuthToken;
  Vue.prototype.$user_id = store.getters.getUserId;
  Vue.prototype.$user_email = store.getters.getUserEmail;
  Vue.prototype.$user_type = store.getters.getUserType;

  axios.defaults.headers.common["Authorization"] =
    "Bearer " + store.getters.getAuthToken;
}

new Vue({
  router,
  vuetify,
  render: (h) => h(App),
}).$mount("#app");
