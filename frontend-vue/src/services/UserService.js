/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
  async login(email, password) {
    return await Api().post("/api/login", {
      email,
      password
    });
  },

  logout() {
    Api().post("/logout").then(
      (res) => res.data,
      (err) => Promise.reject(err.message)
    )
    .catch((err) => Promise.reject(err.message));
  },

  async createAccount(user) {
    const response = await Api().post("/api/users", user)
    return response.data;
  },

  async fetchUserInfo(userId) {
    const response = await Api().get(`/api/users/${userId}`);
    return response.data;
  },


};
