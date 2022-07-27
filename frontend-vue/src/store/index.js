import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

import UserService from "@/services/UserService";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    auth_token: localStorage.getItem("auth_token") || "",
    user_id: localStorage.getItem("user_id") || "",
    is_admin: localStorage.getItem("is_admin") || "",
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
    setUserType(state, data) {
      state.is_admin = data;
    },
    login(state, data) {
      state.auth_token = data.token;
      state.user_id = data.id;
      state.is_admin = data.admin ? true : false;

      localStorage.setItem("auth_token", data);
      localStorage.setItem("user_id", data.user_id);
      localStorage.setItem("is_admin", data.is_admin);

      Vue.prototype.$user_id = data.user_id;
      Vue.prototype.$is_admin = data.is_admin;

      axios.defaults.headers.common["Authorization"] = "Bearer " + state.auth_token;

    },
    logout(state) {
      state.auth_token = "";
      state.user_id = "";
      state.is_admin = "";

      delete axios.defaults.headers.common["Authorization"];

      localStorage.removeItem("auth_token");
      localStorage.removeItem("user_id");
      localStorage.removeItem("is_admin");

      Vue.prototype.$user_id = null;
      Vue.prototype.$is_admin = null;

      localStorage.clear();
    },
  },
  getters: {
    getAuthToken: (state) => state.auth_token,
    getUserId: (state) => state.user_id,

    isAuthenticated: (state) => !!state.auth_token,
    isModerator: (state) => state.is_admin,
  },
});
