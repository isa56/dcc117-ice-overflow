<template>
  <div
    overlay-opacity="1"
    class="bg-background-dark md:p-12 my-10 pt-8 p-2 rounded-md"
  >
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <h4 class="text-base text-white mr-4">Autor {{ post.authorName }}:</h4>
        <h2 class="text-2xl text-primary font-bold">{{ post.title }}</h2>
      </div>
      <div class="flex">
        <theme-span class="mr-2" :theme="post.materia" color="#5BA39D" />
      </div>
    </div>

    <div class="my-8">
      <p>{{ post.body }}</p>
    </div>

    <div class="flex justify-between text-lg">
      <div class="items-center">
        <span @click="$emit('votePost', post.id)">
          <v-icon class="ml-3 cursor-pointer" color="#F2F7FB">mdi-thumb-up</v-icon>
          {{ post.vote }}
        </span>
        <span>
          <v-icon class="ml-3" color="#F2F7FB">mdi-forum</v-icon>
          {{ post.comentarios }}
        </span>
      </div>
      <div>
        <button
          @click="$emit('showCommentModal')"
          class="bg-primary text-background-dark font-bold p-2 rounded drop-shadow-md">
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
};
</script>

<style scoped></style>
