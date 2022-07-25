<template>
  <div class="flex flex-col px-36 py-8">
    <post-details :post="post" />

    <div>
      <post-comment
        v-for="comment in post.comments"
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

export default {
  components: { PostDetails, PostComment },
  name: "PostDetailsView",
  data() {
    return {
      post: {
        id: 1,
        title: "Lorem Ipsum",
        authorName: "GatinhoFeliz123",
        text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        upvotes: 16,
        comments: [
          {
            id: 1,
            author: "ComentadorAnônimo1",
            text: "What is Lorem Ipsum? orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
          },
          {
            id: 2,
            author: "ComentadorAnônimo2",
            text: "Where does it come from?",
          },
          { id: 3, author: "ComentadorAnônimo3", text: "Why do we use it?" },
          {
            id: 4,
            author: "ComentadorAnônimo4",
            text: "Where can I get some?",
          },
        ],
        themes: [
          { id: 1, name: "Tema 1", color: "#6BBBB5" },
          { id: 2, name: "Tema 2", color: "#5F7D87" },
          { id: 3, name: "Tema 3", color: "white" },
        ],
      },
    };
  },
  created() {
    PostService.fetchOne(this.$route.params.id)
      .then((res) => (this.post = res))
      .catch((err) => {
        this.$vtoast.open(err.message);
      });
  },
};
</script>

<style scoped></style>
