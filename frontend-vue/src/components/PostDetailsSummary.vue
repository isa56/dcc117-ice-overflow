<template>
  <div class="bg-background-dark w-full my-10 pt-8 p-12 rounded-md">
    <div class="mb-8">
      <div class="flex mb-2 items-baseline justify-start">
        <h4 class="text-base text-white mr-4">Autor {{ post.authorName }}:</h4>
        <h2 class="text-3xl text-primary font-bold">{{ post.title }}</h2>
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
      <p>{{ textResume }}</p>
    </div>

    <div class="flex justify-between text-md">
      <div class="items-center justify-start">
        <div class="mb-4">
          <v-icon color="#F2F7FB">thumb_up</v-icon>
          {{ post.upvotes }} Reações
        </div>
        <div>
          <v-icon color="#F2F7FB">forum</v-icon>
          {{ post.commentsCount }} Comentários
        </div>
      </div>
    </div>

    <div class="mt-4 text-md">
      <router-link to="post" class="text-primary">Ver mais >></router-link>
    </div>
  </div>
</template>

<script>
import ThemeSpan from "@/components/ThemeSpan";

export default {
  name: "PostDetailsSummary",
  props: ["post"],
  components: { ThemeSpan },
  data() {
    return {
        textResume: this.post.text.length > 500 ? this.post.text.slice(0, 500) + "..." : this.post.text
    };
  },
};
</script>

<style scoped></style>
