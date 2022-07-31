<template>
  <div
    overlay-opacity="1"
    class="bg-background-dark md:p-12 my-10 pt-8 p-2 rounded-md"
  >
    <div class="mb-8">
      <div class="flex items-center justify-between">
        <div class="flex mb-2 items-center justify-start">
          <router-link
            class="text-base text-white mr-4 cursor-pointer underline break-words"
            :to="{ name: 'perfil', params: { id: post.user_id } }"
          >
            {{ post.user_name }}:
          </router-link>

          <h2 class="text-2xl text-primary font-bold break-words">{{ post.title }}</h2>
        </div>

        <div
          id="deleteContainer"
          v-if="
            post.user_id === $store.getters.getUserId ||
            $store.getters.isModerator
          "
        >
          <v-tooltip attach="#deleteContainer" top>
            <template v-slot:activator="{ on, attrs }">
              <v-icon
                v-bind="attrs"
                v-on="on"
                @click="$emit('deletePost', post.id)"
                color="rgb(248 113 113)"
                >mdi-delete</v-icon
              >
            </template>
            <span>Apagar Post</span>
          </v-tooltip>
        </div>
      </div>

      <div class="flex">
        <theme-span class="mr-2" :theme="post.materia" color="#5BA39D" />
      </div>
    </div>

    <div class="my-8 break-words">
      <p>{{ post.body }}</p>
    </div>

    <div class="flex justify-between text-lg">
      <div class="items-center">
        <span @click="$emit('votePost', post.id)" id="votesNumberContainer">
          <v-tooltip attach="#votesNumberContainer" top>
            <template v-slot:activator="{ on, attrs }">
              <span v-bind="attrs" v-on="on">
                <v-icon class="ml-3 cursor-pointer" color="#F2F7FB"
                  >mdi-thumb-up</v-icon
                >
                {{ post.vote }}
              </span>
            </template>
            <span>Curtir</span>
          </v-tooltip>
        </span>
        <span id="commentNumberContainer">
          <v-tooltip attach="#commentNumberContainer" top>
            <template v-slot:activator="{ on, attrs }">
              <span v-bind="attrs" v-on="on">
                <v-icon class="ml-3" color="#F2F7FB">mdi-forum</v-icon>
                {{ numberOfComments }}
              </span>
            </template>
            <span>Comentários</span>
          </v-tooltip>
        </span>
      </div>
      <div>
        <button
          @click="$emit('showCommentModal')"
          class="bg-primary text-background-dark font-bold p-2 rounded drop-shadow-md"
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
  props: ["post", "numberOfComments"],
  components: { ThemeSpan },
};
</script>
