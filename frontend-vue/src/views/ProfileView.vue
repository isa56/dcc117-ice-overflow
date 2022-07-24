<template>
  <div class="flex flex-col px-36 py-8">

    <div class="bg-background-dark mb-4 p-4 rounded-md">
      <div class="mb-8">
        <div class="flex mb-2 items-center flex-wrap">
            <div class="flex space-x-3.5 mb-7">
                <img class="" src="" alt="fotoPerfil">
                <h2 class="text-2xl text-primary font-bold">{{ name }}</h2>
                <h2 class="text-2x1 text-primary">{{ user }}</h2>
            </div>
            <span class="text-base text-white">{{ post.text }}</span>
        </div>
      </div>
    </div>

    <PostProfile :post="post" />

  </div>
</template>

<script>
import PostProfile from "@/components/PostProfile.vue";

export default {
  components: { PostProfile },
  name: "ProfileView",
  data() {
    return {
      name: 'Joaozinho',
      user: '@joao123',
      description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",  
      post: {
        title: "Lorem Ipsum",
        authorName: "GatinhoFeliz123",
        text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
      },
    };
  },
};
</script>

<style scoped></style>
