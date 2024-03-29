<template>
  <div class="md:px-36 flex flex-col px-1 py-8" id="postContainer">
    <div v-if="post && !isLoading">
      <v-dialog
        v-model="shouldOpenModal"
        @click:outside="closeModal"
        attach="#postContainer"
        max-width="800"
        overlay-color="bg-background-dark"
      >
        <form class="bg-background-dark p-8" @submit.prevent="submitComment">
          <div class="flex justify-end">
            <v-icon class="cursor-pointer" @click="closeModal" color="#5BA39D"
              >mdi-close</v-icon
            >
          </div>
          <h1 class="font-bold text-xl pb-1">Comentar:</h1>
          <v-textarea
            solo
            name="input-7-4"
            label="Comentário"
            v-model="commentText"
          ></v-textarea>
          <span></span>
          <div class="flex justify-center">
            <input
              class="input font-medium send-button px-12 py-2 w-50 h-18 mb-3 text-background-dark rounded bg-primary text-2xl mt-2"
              type="submit"
              value="Enviar"
              @click="submitComment"
            />
            <br />
          </div>
        </form>
      </v-dialog>
      <post-details
        :post="post"
        :numberOfComments="comments.length"
        @showCommentModal="showModal"
        @votePost="votePost"
        @deletePost="deletePost"
      />

      <div>
        <post-comment
          v-for="comment in comments"
          :key="comment.id"
          :comment="comment"
          :has-best-comment="post.finished"
          :post-author-id="post.user_id"
          @set-best-comment="chooseBestComment"
          @deleteComment="deleteComment"
        />
      </div>
    </div>
    <div class="flex flex-row justify-center" v-else>
      <loading />
    </div>
  </div>
</template>

<script>
import PostDetails from "@/components/PostDetails.vue";
import PostComment from "@/components/PostComment.vue";
import PostService from "@/services/PostService";
import Loading from "@/components/Loading";
import { toastShow } from "@/utils/vtoast";

export default {
  components: { PostDetails, PostComment, Loading },
  name: "PostDetailsView",
  data() {
    return {
      post: {},
      comments: [],
      commentText: "",
      shouldOpenModal: false,
      isLoading: true,
    };
  },
  methods: {
    chooseBestComment(commentId) {
      PostService.chooseComment(commentId, this.post.id)
        .then(() => {
          toastShow(
            this.$root.vtoast,
            "Comentário marcado com sucesso!",
            "#4CAF",
            true
          );
          this.fetchPost();
        })
        .catch((error) => toastShow(this.$root.vtoast, error));
    },
    deleteComment(commentId) {
      PostService.deleteComment(commentId)
        .then(() => {
          toastShow(
            this.$root.vtoast,
            "Comentário deletado com sucesso!",
            "#4CAF",
            true
          );
          this.fetchPost();
        })
        .catch((error) => toastShow(this.$root.vtoast, error));
    },
    deletePost(postId) {
      PostService.deletePost(postId)
        .then(() => {
          toastShow(
            this.$root.vtoast,
            "Post deletado com sucesso!",
            "#4CAF",
            true
          );
          this.$router.push({ name: "posts" });
        })
        .catch((error) => toastShow(this.$root.vtoast, error));
    },

    showModal() {
      this.shouldOpenModal = true;
    },
    closeModal() {
      this.shouldOpenModal = false;
    },
    submitComment() {
      this.isLoading = true;
      PostService.submitComment(
        this.$store.getters.getUserId,
        this.post.id,
        this.commentText
      )
        .then(() => {
          toastShow(
            this.$root.vtoast,
            "Comentário criado com sucesso!",
            "#4CAF",
            true
          );
          this.fetchPost();
        })
        .catch((error) => toastShow(this.$root.vtoast, error))
        .finally(() => {
          this.commentText = "";
          this.closeModal();
          this.isLoading = false;
        });
    },
    fetchPost() {
      this.isLoading = true;
      PostService.fetchOne(this.$route.params.id)
        .then((res) => {
          this.post = res.post;
          this.comments = res.postComments;
          this.isLoading = false;
        })
        .catch((err) => toastShow(this.$root.vtoast, err));
    },
    votePost(postId) {
      this.isLoading = true;
      PostService.upvotePost(postId)
        .then(() => this.fetchPost())
        .catch((err) => toastShow(this.$root.vtoast, err));
    },
  },
  created() {
    this.fetchPost();
  },
};
</script>

<style scoped></style>
