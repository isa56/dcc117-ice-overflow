/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
  async create(post) {
    const response = await Api().post("/api/posts", post)
    return response.data;
  },

  async fetchAll(postTitle = "", subject = "", highlights = false, recent = false, page = 1) {
    const response = await Api().get("/api/posts", {
      params: {
        titulo: postTitle,
        materia: subject,
        reactions: highlights,
        recent,
        page
      }
    });

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

  deletePost() {},

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

  // chooseComment(commentId) {}
};
