/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
  create(post, userId) {
    const api = Api();
    let formData = new FormData();

    if (post.hasOwnProperty("title")) {
      formData.append("title", post.title);
    }

    if (post.hasOwnProperty("text")) {
      formData.append("body", post.text);
    }

    if (post.hasOwnProperty("archive")) {
      formData.append("file", post.archive);
    }

    formData.append("user_id", userId);

    return api
      .post("/api/posts", formData)
      .then(
        (response) => {
          return response.data;
        },
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

  fetchAll() {},

  fetchOne(postId) {
    return Api()
      .get(`/api/posts/${postId}`)
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

  upvotePost(postId) {
    return Api()
      .patch(`/api/posts/${postId}`)
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

  delete() {},

  search() {},
};
