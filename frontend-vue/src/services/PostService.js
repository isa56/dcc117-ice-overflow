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

    formData.append("user_id", userId);

    return api
      .post("/api/posts", formData)
      .then(
        (response) => response.data,
        (error) => Promise.reject(error.message)
      )
      .catch((error) => Promise.reject(error.message));
  },

  async fetchAll() {
    const response = await Api().get("/api/posts");
    return response.data;
  },

  fetchOne(postId) {
    return Api()
      .get(`/api/posts/${postId}`)
      .then(
        (response) => response.data,
        (error) => Promise.reject(error)
      )
      .catch((error) => Promise.reject(error));
  },

  upvotePost(postId) {
    return Api()
      .patch(`/api/posts/${postId}`)
      .then(
        (response) => response.data,
        (error) => Promise.reject(error.message)
      )
      .catch((error) => Promise.reject(error.message));
  },


  search() {},

  submitComment(userId, postId, comment) {
    return Api()
      .post(`/api/comments`, {
        body: comment,
        post_id: postId,
        user_id: userId,
      })
      .then(
        (response) => response.data,
        (error) => Promise.reject(error.message)
      )
      .catch((error) => Promise.reject(error.message));
  },

  deleteComment(commentId) {
    return Api()
      .delete(`/api/comments/${commentId}`)
      .then(
        (res) => res.data,
        (err) => Promise.reject(err.message)
      )
      .catch((err) => Promise.reject(err.message));
  },

  deletePost(postId) {
    return Api()
      .delete(`/api/posts/${postId}`)
      .then(
        (res) => res.data,
        (err) => Promise.reject(err.message)
      )
      .catch((err) => Promise.reject(err.message));
  },

  // chooseComment(commentId) {}
};
