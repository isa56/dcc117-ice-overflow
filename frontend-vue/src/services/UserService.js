import Api from "@/services/Api";
import store from "@/store";
import router from "@/router";

export default {
  async login(email, password) {
    return Api().post("/api/login", { email, password });
  },

  async logout() {
    return Api()
      .get("/api/logout")
      .then((response) => {
        console.log(response.data);
        store.commit("logout");
        router.push({ name: "login" });
      });
  },

  createAccount({ name, username, email, password }) {
    console.log(name, username, email, password);
  },

  fetchUserInfo(userId) {
    console.log(userId);
  },
};
