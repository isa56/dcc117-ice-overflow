<template>
  <div class="bg-background-dark mb-4 p-4 rounded-md" :class="comment.best_answer === 1 ? 'border-green-500' : ''">
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <!-- <h2 class="text-lg text-primary mr-4">Autor {{ comment.author }}:</h2> -->
        <span class="text-base text-white">{{ comment.body }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostComment",
  props: ["comment"]
};
</script>

<style></style>
