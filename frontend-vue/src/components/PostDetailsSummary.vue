<template>
  <div class="bg-background-dark w-full my-4 md:my-8 pt-8 p-6 md:p-12 rounded-md">
    <div class="mb-8">
      <div class="flex mb-2 items-baseline justify-start break-all">
        <router-link :to="{ name: 'perfil', params: { id: post.user_id } }" class="text-base text-white mr-4 break-all cursor-pointer underline">{{ post.author }}:</router-link>
        <router-link :to="{ name: 'ver-post', params: { id: post.id }}" class="text-3xl text-primary font-bold break-all">{{ post.title }}</router-link>
      </div>
      <div class="flex">
        <theme-span
          class="mr-2"
          :theme="post.materia"
          color="#6BBBB5"
        />
      </div>
    </div>

    <div class="my-8">
      <p>{{ bodySummary }}</p>
    </div>

    <div class="flex justify-between text-md">
      <div class="items-center justify-start">
        <div class="mb-4">
          <v-icon color="#F2F7FB">mdi-thumb-up</v-icon>
          {{ post.vote }} Reações
        </div>
        <div>
          <v-icon color="#F2F7FB">mdi-forum</v-icon>
          {{ post.comentarios }} Comentários
        </div>
      </div>
    </div>

    <div class="mt-4 text-md">
      <router-link
        :to="{ name: 'ver-post', params: { id: post.id }}" 
        class="text-primary"
      >
        Ver mais >>
      </router-link>
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
        bodySummary: this.post.body.length > 500 ? this.post.body.slice(0, 500) + "..." : this.post.body
    };
  },
};
</script>
