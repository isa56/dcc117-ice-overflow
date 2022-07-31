<template>
  <div class="items-center bg-background flex h-full justify-center px-2">
    <div class="bg-background-dark text-white rounded-lg px-2 md:px-60 py-16">
      <h1 class="text-primary text-4xl mb-8 text-center">
        ICE <span class="text-secondary">Overflow</span>
      </h1>

      <form class="md:w-96" @submit.prevent="validateLogin">
        <label for="email" class="my-2">E-Mail</label>
        <input
          id="email"
          name="email"
          class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark"
          type="email"
          required
          placeholder="nome@email.com"
          v-model="email"
        />
        <label for="password" class="my-2">Senha</label>
        <input
          id="password"
          name="password"
          class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark"
          type="password"
          required
          placeholder="*******"
          v-model="password"
        />
        <br />
        <input
          class="input send-button px-3 py-2 w-full mb-6 text-bold text-background-dark rounded bg-primary text-lg mt-1 px-1.8 py-0.8"
          type="submit"
          value="Entrar"
        />
        <br />
        <p class="text-center">
          Não possui uma conta?
          <router-link class="text-primary" to="/criar-conta"
            >Cadastre-se!</router-link
          >
        </p>
        <v-alert v-if="errorMessage" type="error">
          Por favor, preencha {{ errorMessage }}</v-alert
        >
      </form>
    </div>
  </div>
</template>

<script>
import UserService from "@/services/UserService";
import { toastShow } from "../utils/vtoast";

export default {
  name: "LoginView",
  data() {
    return {
      email: "",
      password: "",
      errorMessage: "",
    };
  },
  methods: {
    async validateLogin() {
      let emailError;
      let passwordError;
      if (!this.email) emailError = "o campo de E-Mail";
      if (!this.password) passwordError = "o campo de Senha";

      if (emailError) {
        this.errorMessage = emailError;
        if (passwordError) this.errorMessage += " e " + passwordError;
        return;
      } else {
        this.errorMessage = "";

        try {
          const { data: token } = await UserService.login(
            this.email,
            this.password
          );

          this.$store.commit("login", token);

          return this.$router.push("/posts");
        } catch (error) {
          toastShow(this.$root.vtoast, error.message);
        }
      }
    },
  },
};
</script>

<style scoped>
.form-container {
  padding: 4em 18em;
}
</style>
