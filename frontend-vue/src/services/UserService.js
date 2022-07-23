/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
  async login(email, password) {
    console.log(email);
    console.log(password);

    let formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);

    try {
      const response = await Api()
        .post("/api/login", formData)
      return response;
    } catch (err) {
      console.log(err.message);
    }

    // Api()
    //   .post("/api/login", formData)
    //   .then(
    //     (response) => response.data,
    //     (error) => {
    //       if (error.message) {
    //         this.$root.vtoast.show({
    //           color: "danger",
    //           message: error.message,
    //           timeout: 5000,
    //         });
    //       }

    //       console.log(error.message);

    //       return Promise.reject(error.message);
    //     }
    //   )
    //   .catch((error) => {
    //     if (error.message) {
    //       this.$root.vtoast.show({
    //         color: "danger",
    //         message: error.message,
    //         timeout: 5000,
    //       });
    //     }

    //     console.log(error.message);

    //     return Promise.reject(error.message);
    //   });
  },

  createAccount({ name, username, email, password }) {
    console.log(name, username, email, password);
  },

  fetchUserInfo(userId) {
    console.log(userId);
  },
};
