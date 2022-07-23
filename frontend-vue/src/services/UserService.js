/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
  async login(email, password) {
    return await Api().post("/api/login", {
      email,
      password
    });
  },

  createAccount({ name, username, email, password }) {
    console.log(name, username, email, password);
  },

  fetchUserInfo(userId) {
    console.log(userId);
  },
};
