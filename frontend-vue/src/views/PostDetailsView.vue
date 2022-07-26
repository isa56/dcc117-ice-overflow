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
              >close</v-icon
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
        @showCommentModal="showModal"
        @votePost="votePost"
      />

      <div>
        <post-comment
          v-for="comment in comments"
          :key="comment.id"
          :comment="comment"
          :has-best-comment="post.finished"
          @set-best-comment="chooseBestComment"
          @delete-comment="deleteComment"
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
import { toastShow } from "../utils/vtoast";

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
      console.log(commentId);
    },
    deleteComment(commentId) {
      console.log(commentId);
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
            "success"
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
