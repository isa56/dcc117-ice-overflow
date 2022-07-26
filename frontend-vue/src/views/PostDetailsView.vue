<template>
  <div class="md:px-36 flex flex-col px-1 py-8" v-if="post">
    <post-details :post="post" />

    <div>
      <post-comment
        v-for="comment in comments"
        :key="comment.id"
        :comment="comment"
        @set-best-comment="chooseBestComment"
      />
    </div>
  </div>
</template>

<script>
import PostDetails from "@/components/PostDetails.vue";
import PostComment from "@/components/PostComment.vue";
import PostService from "@/services/PostService";
import { toastShow } from "../utils/vtoast";

export default {
  components: { PostDetails, PostComment },
  name: "PostDetailsView",
  data() {
    return {
      post: {},
      comments: [],
    };
  },
  methods: {
    chooseBestComment(commentId) {
      console.log(commentId);
    },
  },
  created() {
    PostService.fetchOne(this.$route.params.id)
      .then((res) => {
        this.post = res.post;
        this.comments = res.postComments;
      })
      .catch((err) => {
        toastShow(this.$root.vtoast, err);
        console.log(err);
      });
  },
};
</script>

<style scoped></style>
