import Api from "@/services/Api";

export default {
  login(email, password) {
    let formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);
    Api()
      .post("/api/login", formData)
      .then(
        (response) => response.data,
        (error) => {
          if (error.message) {
            this.$root.vtoast.show({
              color: "danger",
              message: error.message,
              timeout: 5000,
            });
          }
          return Promise.reject(error.message);
        }
      )
      .catch((error) => {
        if (error.message) {
          this.$root.vtoast.show({
            color: "danger",
            message: error.message,
            timeout: 5000,
          });
        }
        return Promise.reject(error.message);
      });
  },

  createAccount({ name, username, email, password }) {
    console.log(name, username, email, password);
  },

  fetchUserInfo(userId) {
    console.log(userId);
  },
};
