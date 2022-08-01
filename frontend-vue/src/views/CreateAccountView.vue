<template>
  <div class="bloco1 items-center bg-background flex h-full justify-center">
    <div class=" bloco-central bg-background-dark text-white rounded-lg px-36 py-12">

      <h1 class="text-primary text-4xl mb-8 text-center">
        ICE <span class="text-secondary">Overflow</span>
      </h1>

      <form class="form-style w-96" @submit.prevent="validateRegistration">
        <h5 class="my-2">Nome</h5>
        <input class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark" type="text" required
          placeholder="nome" v-model="name" />
        <h5 class="my-2">E-Mail</h5>
        <input class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark" for="email" type="email" required
          placeholder="nome@email.com" v-model="email" />
        <h5 class="my-2">Senha</h5>
        <input class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark" type="password" required
          placeholder="*******" v-model="password" />
        <h5 class="my-2">Confirmar senha</h5>
        <input class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark" type="password" required
          placeholder="*******" v-model="cPassword" />
        <div class="flex justify-center">
          <br />

          <input
            class="input send-button px-3 py-2 w-full mb-5 text-bold  rounded text-white bg-primary text-lg w-56 h-12 mt-8"
            type="submit" value="Criar conta" @click="userCreate" />

          <br />
        </div>
        <v-alert v-if="errorMessage" type="error">{{ errorMessage }}</v-alert>
      </form>

    </div>
  </div>
</template>


<script>
import UserService from '@/services/UserService'


export default {
  name: 'CreateAccountView',
  components: {},
  data() {
    return {
      errorMessage: "",
      name: "",
      email: "",
      password: "",
      cPassword: "",
    }
  },

  methods: {

    validateRegistration: function (e) {
      if(this.name && this.email && this.password == this.cPassword && this.password.length >= 8) {
        return true;
      }
      if (!this.name) {
        this.errorMessage = "  Por favor, preencha o Nome"
      }
      if (!this.email) {
        this.errorMessage = "  Por favor, preencha o Email";
      }
      if (this.password != this.cPassword) {
        this.errorMessage = "  As senhas devem ser iguais!"
      }
      if (this.password.length < 8) {
        this.errorMessage = "  Senha muito fraca!";
        return false;
      }
      e.preventDefault();
    },

    async userCreate() {
      const user = {
        name: this.name,
        email: this.email,
        password: this.password
      }
      const data = await UserService.createAccount(user);
      this.$store.commit("login", data);
      return this.$router.push("/posts");
    }
  },


}
</script>

<style scoped>
.bloco1 {
  height: auto;
}

.bloco-central {
  margin: 2.5rem 2.5rem 2.5rem 2.5rem;
}

@media (max-width: 530px) {
  .bloco-central {
    max-width: 12rem;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 5rem;
    padding-left: 9rem;
    padding-right: 9rem;
  }

  .form-style {
    min-width: 12rem;
  }
}
</style>
