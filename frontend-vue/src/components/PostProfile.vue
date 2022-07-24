<template>
  <div class="bloco bg-background-dark my-4 pt-8 p-12 rounded-md w-auto">
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <a href="" class="text-2xl text-primary font-bold underline underline-offset-1">{{ post.title }}</a>
      </div>
    </div>

    <div class="my-8">
      <p>{{ post.text }}</p>
    </div>

  </div>
</template>

<script>

export default {
  name: "PostProfile",
  props: ["post"],
  data() {
    return {};
  },
};
</script>

<style scoped>

.bloco {
  min-width: 18rem;
}

</style>
