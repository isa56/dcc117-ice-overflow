<template>
  <div class="bloco bg-background-dark my-4 pt-8 p-12 rounded-md w-auto">
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <router-link
          :to="{ name: 'ver-post', params: { id: post.id }}" 
          class="text-2xl text-primary font-bold underline underline-offset-1"
        >
          {{ post.title }}
        </router-link>
      </div>
    </div>

    <div class="my-8">
      <p>{{ bodySummary }}</p>
    </div>

  </div>
</template>

<script>

export default {
  name: "PostProfile",
  props: ["post"],
  data() {
    return {
      bodySummary: this.post.body.length > 500 ? this.post.body.slice(0, 500) + "..." : this.post.body
    };
  },
};
</script>

<style scoped>

.bloco {
  min-width: 18rem;
}

</style>
