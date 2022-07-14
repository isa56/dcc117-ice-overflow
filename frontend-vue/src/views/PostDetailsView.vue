<template>
  <div class="flex">
    <post-details :post="post" />
  </div>
</template>

<script>
import PostDetails from "@/components/PostDetails.vue";

export default {
  components: { PostDetails },
  name: "PostDetailsView",
  props: ["PostDetails"],
  data() {
    return {
      post: {
        title: "Lorem Ipsum",
        authorName: "GatinhoFeliz123",
        text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        upvotes: 16,
        comments: [
          { author: "ComentadorAnônimo1", text: "What is Lorem Ipsum?" },
          { author: "ComentadorAnônimo1", text: "Where does it come from?" },
          { author: "ComentadorAnônimo1", text: "Why do we use it?" },
          { author: "ComentadorAnônimo1", text: "Where can I get some?" },
        ],
        themes: [
          { id: 1, name: "Tema 1", color: "#6BBBB5" },
          { id: 2, name: "Tema 2", color: "#5F7D87" },
          { id: 3, name: "Tema 3", color: "white" },
        ],
      },
    };
  },
  created: {
    // fetchPosts
  },
};
</script>

<style scoped></style>
