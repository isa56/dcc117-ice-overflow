<template>
  <div class="items-center bg-background flex h-full justify-center">
    <div class="bg-background-dark text-white rounded-lg px-36 py-12">
      <div class="w-max">
        <h1 class="text-white font-bold text-4xl mb-8 text-center">
          CRIAR UM NOVO POST
        </h1>

        <form method="POST" class="w-100" @submit.prevent="checkForm">

          <input class="title-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" type="text"
            placeholder="Título" v-model="title" />
          <textarea class="desc-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" rows="5" cols="30"
            type="text" placeholder="Descrição" v-model="text" />
          <br>

          <label
            class="label-file px-8 py-2 w-full mb-8 text-bold text-background-dark rounded bg-primary text-lg mt-1 px-1.8 py-0.8"
            for="arquivo">Enviar arquivos</label>
          <input class="input-file" type="file" name="arquivo" id="arquivo" ref="file" />

          <div class="flex justify-center">
            <input
              class=" input font-medium send-button px-12 py-2 w-50 h-18 mb-6 text-background-dark rounded bg-primary text-2xl mt-8"
              type="submit" value="ENVIAR" @click="checkForm" />
            <br>
          </div>

          <v-alert class="alert-style alert-erro-style" type="error">
            {{ errors[0] }}
            <br>
            {{ errors[1] }}
          </v-alert>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreatePost",
  components: {},

  data() {
    return {
      errors: [],
      title: null,
      text: null,
      archive: null,
    }
  },

  methods: {

    checkForm: function (e) {
      var titleStyle = document.querySelector(".title-style");
      var descStyle = document.querySelector(".desc-style");
      var alertStyle = document.querySelector(".alert-style");
      titleStyle.classList.remove("error-style");
      descStyle.classList.remove("error-style");
      alertStyle.classList.add("alert-erro-style");
      this.errors = [];

      if (this.title && this.text) {
        return true;
      }

      if (!this.title) {
        this.errors.push('O Título é obrigatório.');
        titleStyle.classList.add("error-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
        this.snackbar = true;
      }
      if (!this.text) {
        this.errors.push('A Descrição é obrigatória.');
        descStyle.classList.add("error-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
        this.snackbar = true;
      }

      e.preventDefault();
    }

  },

}

</script>

<style scoped>
.input-file[type="file"] {
  display: none;
}

.error-style {
  background-color: rgb(185, 67, 67);
}

.li-style {
  color: rgb(185, 67, 67);
}

.alert-erro-style {
  display: none;
}
</style>
