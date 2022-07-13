<template>
  <div class="items-center bg-background flex h-full justify-center">
    <div class="bg-background-dark text-white rounded-lg px-36 py-12">
      <div class="w-max">
        <h1 class="text-white font-bold text-4xl mb-8 text-center">
          CRIAR UM NOVO POST
        </h1>

        <form method="POST" class="w-100" @submit.prevent="validateForm">
          <input
            class="rounded mb-3 px-2 py-3 w-full bg-white text-background-dark"
            type="text"
            placeholder="Título"
            v-model="title"
          />
          <textarea
            class="rounded mb-3 px-2 py-3 w-full bg-white text-background-dark"
            rows="5"
            cols="30"
            type="text"
            placeholder="Texto"
            v-model="text"
          />
          <br />

          <label
            class="label-file px-8 py-2 w-full mb-8 text-bold text-background-dark rounded bg-primary text-lg mt-1 px-1.8 py-0.8"
            for="arquivo"
            >Enviar arquivos</label
          >
          <input
            class="input-file"
            type="file"
            name="arquivo"
            id="arquivo"
            v-on:change="fileChange"
          />

          <div class="flex justify-center">
            <input
              class="input font-medium send-button px-12 py-2 w-50 h-18 mb-6 text-background-dark rounded bg-primary text-2xl mt-8"
              type="submit"
              value="ENVIAR"
              @click="validateForm"
            />
            <br />
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreatePostView",
  data() {
    return {
      errors: [],
      title: null,
      text: null,
      archive: null,
    };
  },
  methods: {
    validateForm() {},
    fileChange() {},
  },
};
</script>

<style scoped>
.input-file[type="file"] {
  display: none;
}
</style>
