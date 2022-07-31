<template>
  <div class="items-center bg-background flex justify-center">
    <div class="bloco-central bg-background-dark text-white rounded-lg px-36 py-12">
      <h1 class="text-style text-white font-bold text-4xl mb-8 text-center">
        Criar um novo post
      </h1>

      <form class="form-style w-100" @submit.prevent="checkForm">

        <label for="title">Título</label>
        <input 
          id="title"
          name="title"
          class="title-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark"
          type="text"
          placeholder="Título" 
          v-model="title"
        />

        <label for="content">Conteúdo</label>
        <textarea
          id="content"
          name="content"
          class="desc-style rounded mb-3 px-2 py-3 w-full bg-white text-background-dark"
          rows="5"
          cols="30"
          type="text"
          placeholder="Conteúdo"
          v-model="text"></textarea>
        <br>

        <label for="content">Disciplina</label>
        <div class="relative" id="selectContainer">
          <v-autocomplete class="w-56" solo attach="#selectContainer" :items="subjects" v-model="subject" label="Disciplina"> </v-autocomplete>
        </div>

        <div class="flex justify-center">
          <input
            class=" input font-medium send-button px-12 py-2 w-50 h-18 mb-3 text-background-dark rounded bg-primary text-xl mt-2"
            type="submit" value="Enviar" @click="createPost" />
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
</template>

<script>
import PostService from "@/services/PostService";
import SubjectService from "@/services/SubjectService";
import { toastShow } from "@/utils/vtoast";
export default {
  name: "CreatePost",
  components: {},

  data() {
    return {
      errors: [],
      title: null,
      text: null,
      subject: '',
      subjects: [],
    }
  },

  methods: {

    checkForm: function (e) {
      var titleStyle = document.querySelector(".title-style");
      var descStyle = document.querySelector(".desc-style");
      var alertStyle = document.querySelector(".alert-style");
      titleStyle.classList.remove("erro-form-style");
      descStyle.classList.remove("erro-form-style");
      alertStyle.classList.add("alert-erro-style");
      this.errors = [];

      if (this.title && this.text) {
        return true;
      }

      if (!this.title) {
        this.errors.push('O Título é obrigatório.');
        titleStyle.classList.add("erro-form-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
      }
      if (!this.text) {
        this.errors.push('A Descrição é obrigatória.');
        descStyle.classList.add("erro-form-style");
        alertStyle.classList.remove("alert-erro-style");
        alertStyle.classList.add("error-style");
      }
      
      e.preventDefault();
    },
    async createPost() {
      this.isLoading = true;

      const post = {
        title: this.title,
        body: this.text,
        materia: this.subject,
        user_id: this.$store.getters.getUserId
      };
      
      try {
        const createdPost = await PostService.create(post);

        toastShow(
          this.$root.vtoast,
          "Post criado com sucesso!",
          "#4CAF",
          true
        );
        return this.$router.push({ name: 'ver-post', params: { id: createdPost.id }})
      } catch (error) {
        toastShow(this.$root.vtoast, error.message);
      } finally {
        this.title = "",
        this.text = "",
        this.subject= ""
        this.isLoading = false;
      }
    }
  },

async created(){
      try {
        this.isLoading = true;
        const subjects = await SubjectService.fetchAll();
        this.subjects = subjects;
      } catch(error) {
        toastShow(this.$root.vtoast, error.data);
      } finally {
        this.isLoading = false;
      }
    },

}

</script>

<style scoped>

.alert-erro-style {
  display: none;
}

.error-style {
  background-color: rgb(185, 67, 67);
}

.erro-form-style {
  border: 2px solid red;
}

.input-file[type="file"] {
  display: none;
}

.bloco-central {
  max-height: 38rem;
  margin: 2.5rem 2.5rem 2.5rem 2.5rem;
}


@media (max-width: 530px) {
  .bloco-central {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    min-width: 15rem;
    margin-bottom: 5rem;
  }
  .form-style {
    min-width: 15rem;
  }
  .text-style {
    min-width: 15rem;
  }

}
</style>
