<template>
  <div class="bg-background-dark mx-2">
    <div class="flex">
      <h4>Autor {{ post.authorName }}</h4>
      <h2>{{ post.title }}</h2>
      <div class="flex"></div>
    </div>
    <div>
      <p>{{ post.text }}</p>
    </div>

    <div class="flex justify-between">
      <div>
        <span>
          <v-icon>thumb-up</v-icon>
          {{ post.upvotes }}
        </span>
        <span>
          <v-icon></v-icon>
          {{ post.comments.length }}
        </span>
      </div>
      <div>
        <button class="">Comentar</button>
      </div>
    </div>
  </div>
</template>

<script>
import ThemeSpan from "@/components/ThemeSpan"

export default {
  name: "PostDetails",
  props: ["post"],
  components: [ThemeSpan],
  data() {
    return {};
  },
};
</script>

<style scoped></style>
