<template>
  <div class="flex flex-col px-36 py-8" v-if="post">
    <post-details :post="post" />

    <div>
      <post-comment
        v-for="comment in post.postComments"
        :key="comment.id"
        :comment="comment"
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
    };
  },
  created() {
    PostService.fetchOne(this.$route.params.id)
      .then((res) => {
        console.log(res);
        this.post = res;
      })
      .catch((err) => {
        toastShow(this.$root.vtoast, err);
        console.log(err);
      });
  },
};
</script>

<style scoped></style>
