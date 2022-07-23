<template>
  <div class="bg-background-dark my-10 pt-8 p-12 rounded-md">
    <div class="mb-8">
      <div class="flex mb-2 items-center justify-start">
        <h2 class="text-2xl text-primary font-bold">{{ post.title }}</h2>
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

<style scoped></style>
