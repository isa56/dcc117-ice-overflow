<template>
  <div
    id="postDetailsContainer"
    overlay-opacity="1"
    class="bg-background-dark my-10 pt-8 p-12 rounded-md"
  >
    <v-dialog
      v-model="shouldOpenModal"
      @click:outside="closeModal"
      attach="#postDetailsContainer"
      max-width="800"
      overlay-color="bg-background-dark"
    >
      <form class="bg-background-dark p-8" @submit.prevent="submitComment">
        <div class="flex justify-end">
          <v-icon class="cursor-pointer" @click="closeModal" color="#5BA39D"
            >close</v-icon
          >
        </div>
        <h1 class="font-bold text-xl pb-1">Comentar:</h1>
        <v-textarea
          solo
          name="input-7-4"
          label="Comentário"
          v-model="commentText"
        ></v-textarea>
        <span></span>
        <div class="flex justify-center">
          <input
            class="input font-medium send-button px-12 py-2 w-50 h-18 mb-3 text-background-dark rounded bg-primary text-2xl mt-2"
            type="submit"
            value="Enviar"
            @click="submitComment"
          />
          <br />
        </div>
      </form>
    </v-dialog>
    <div
      class="mb-8"
      :class="
        shouldOpenModal
          ? 'bg-background-dark backdrop-blur-md backdrop-opacity-75'
          : ''
      "
    >
      <div class="flex mb-2 items-center justify-start">
        <h4 class="text-base text-white mr-4">Autor {{ post.authorName }}:</h4>
        <h2 class="text-2xl text-primary font-bold">{{ post.title }}</h2>
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
      <p>{{ post.text }}</p>
    </div>

    <div class="flex justify-between text-lg">
      <div class="items-center">
        <span @click="votePost">
          <v-icon class="ml-3 cursor-pointer" color="#F2F7FB">thumb_up</v-icon>
          {{ post.upvotes }}
        </span>
        <span>
          <v-icon class="ml-3" color="#F2F7FB">forum</v-icon>
          {{ post.comments.length }}
        </span>
      </div>
      <div>
        <button
          @click="showModal"
          class="bg-primary text-background-dark font-extrabold p-2 rounded drop-shadow-md"
        >
          Comentar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import ThemeSpan from "@/components/ThemeSpan";
import PostService from "@/services/PostService";

export default {
  name: "PostDetails",
  props: ["post"],
  components: { ThemeSpan },
  data() {
    return {
      commentText: "",
      shouldOpenModal: false,
    };
  },
  methods: {
    votePost() {
      PostService.upvotePost(this.post.id);
    },
    showModal() {
      this.shouldOpenModal = true;
    },
    closeModal() {
      this.shouldOpenModal = false;
    },
    submitComment() {
      PostService.submitComment(this.post.id, this.commentText);
      this.commentText = "";
      this.closeModal();
    },
  },
};
</script>

<style scoped></style>
