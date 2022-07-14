<template>

  <div class="items-center bg-background flex h-full justify-center">
    <div class="bg-background-dark text-white rounded-lg px-36 py-12">

      <div class="w-max">
        <h1 class="text-white font-bold text-4xl mb-8 text-center">
          CRIAR UM NOVO POST
        </h1>

        <form method="POST" class="w-100" @submit.prevent="checkForm">

          <input class="rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" type="text" placeholder="Título"
            v-model="title" />
          <textarea class="rounded mb-3 px-2 py-3 w-full bg-white text-background-dark" rows="5" cols="30" type="text"
            placeholder="Descrição" v-model="text" />
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

          <p v-if="errors.length">
            <b class="erro-style">Por favor, corrija o(s) seguinte(s) erro(s):</b>
          <ul>
            <li class="li-style" v-for="error in errors" :key="error" >{{ error }}</li>
          </ul>
          </p>

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
      file: '',
      successAlert: false,
      errorAlert: false,
      uploadedImage: '',
    }
  },

  methods: {

    checkForm: function (e) {
      if (this.name && this.age) {
        return true;
      }

      this.errors = [];

      if (!this.title) {
        this.errors.push('O Título é obrigatório.');
      }
      if (!this.text) {
        this.errors.push('A Descrição é obrigatória.');
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

.li-style {
  color: rgb(224, 63, 63);
}

</style>
