<template>
  <div
    class="bg-background-dark mb-4 p-4 rounded-md"
    :class="comment.best_answer === 1 ? 'best-answer' : ''"
  >
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <h2 class="text-lg text-primary mr-4">Autor {{ comment.author }}:</h2>
        <span class="text-base text-white">{{ comment.body }}</span>
      </div>
    </div>
    <div class="flex justify-end">
      <div v-if="(!hasBestComment) && (postAuthor.user_id === $store.getters.getUserId)" class="mr-4">
        <v-icon @click="$emit('set-best-comment', comment.id)" :color="comment.best_answer === 1 ? 'rgb(251 146 60)' : '#F2F7FB'"
          >mdi-star</v-icon
        >
      </div>
      <div v-if="((comment.user_id === $store.getters.getUserId) || ($store.getters.isModerator))">
        <v-icon @click="$emit('deleteComment', comment.id)" color="rgb(248 113 113)">mdi-delete</v-icon>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "PostComment",
  props: ["comment", "hasBestComment", "postAuthor"],
};
</script>

<style scoped>
.best-answer {
  border: 1px solid rgb(34 197 94);
}
</style>
