<template>
  <div class="bg-background-dark my-10 pt-8 p-12 rounded-md">
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <h4 class="text-base text-white mr-4">Autor {{ post.authorName }}:</h4>
        <h2 class="text-2xl text-primary font-bold">{{ post.title }}</h2>
      </div>
      <div class="flex">
        <theme-span
          class="mr-2"
          v-for="theme in post.themes"
          :key="theme.id"
          :theme="theme.name"
          :color="theme.color"
        />
      </div>
    </div>

    <div class="my-8">
      <p>{{ post.text }}</p>
    </div>

    <div class="flex justify-between text-lg">
      <div class="items-center">
        <span @click="votePost">
          <v-icon class="ml-3 cursor-pointer" color="#F2F7FB">thumb_up</v-icon>
          {{ post.upvotes }}
        </span>
        <span>
          <v-icon class="ml-3" color="#F2F7FB">forum</v-icon>
          {{ post.comments.length }}
        </span>
      </div>
      <div>
        <button
          @click="openCommentModal"
          class="bg-primary text-background-dark font-extrabold p-2 rounded drop-shadow-md"
        >
          Comentar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import ThemeSpan from "@/components/ThemeSpan";

export default {
  name: "PostDetails",
  props: ["post"],
  components: { ThemeSpan },
  data() {
    return {};
  },
  methods: {
    votePost() {},
    openCommentModal() {},
  },
};
</script>

<style scoped></style>
