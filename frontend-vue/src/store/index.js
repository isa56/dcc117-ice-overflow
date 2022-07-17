import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

import UserService from "@/services/UserService";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    auth_token: localStorage.getItem("auth_token") || "",
    user_id: localStorage.getItem("user_id") || "",
    user_email: localStorage.getItem("user_email") || "",
    user_type: localStorage.getItem("user_type") || "",
  },
  actions: {
    async login({ commit }, userData) {
      try {

        const user = await UserService.login({
          email: userData.email,
          password: userData.password,
        });
        commit("login", user);

      } catch (error) {

        console.log(error);
        this.$root.vtoast.show({
          color: "danger",
          message: error.message
            ? error.message
            : "Ocorreu um erro ao acessar o servidor.",
          timeout: 5000,
        });

      }
    },
  },
  mutations: {
    setAuthToken(state, data) {
      state.auth_token = data;
    },
    setUserId(state, data) {
      state.user_id = data;
    },
    setUserEmail(state, data) {
      state.user_email = data;
    },
    setUserType(state, data) {
      state.user_type = data;
    },
    login(state, data) {
      state.auth_token = data.auth_token;
      state.user_id = data.user_id;
      state.user_email = data.user_email;
      state.user_type = data.user_type;

      localStorage.setItem("auth_token", data.auth_token);
      localStorage.setItem("user_id", data.$user_email);
      localStorage.setItem("user_email", data.user_email);
      localStorage.setItem("user_type", data.user_type);

      Vue.prototype.$user_id = data.user_id;
      Vue.prototype.$user_email = data.user_email;
      Vue.prototype.$user_type = data.user_type;

      axios.defaults.headers.common["Authorization"] = "Bearer " + state.auth_token;

    },
    logout(state) {
      state.auth_token = null;
      state.user_id = null;
      state.user_email = null;
      state.user_type = null;

      delete axios.defaults.headers.common["Authorization"];

      localStorage.removeItem("auth_token");
      localStorage.removeItem("user_id");
      localStorage.removeItem("user_email");
      localStorage.removeItem("user_type");

      Vue.prototype.$user_id = null;
      Vue.prototype.$user_email = null;
      Vue.prototype.$user_type = null;

      localStorage.clear();
    },
  },
  getters: {
    getAuthToken: (state) => state.auth_token,
    getUserId: (state) => state.user_id,
    getUserEmail: (state) => state.user_email,
    getUserType: (state) => state.user_type,

    isAuthenticated: (state) => !!state.auth_token,
    isModerator: (state) => state.user_type === "MODERATOR",
  },
});
