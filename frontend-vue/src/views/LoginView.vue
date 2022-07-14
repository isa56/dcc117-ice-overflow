<template>
  <div class="items-center bg-background flex h-full justify-center">
    <div class="bg-background-dark text-white rounded-lg px-60 py-16">
      <h1 class="text-primary text-2xl mb-8 text-center">
        ICE <span class="text-secondary">Overflow</span>
      </h1>

      <form class="w-96" @submit.prevent="validateLogin">
        <h5 class="my-2">E-Mail</h5>
        <input
          class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark"
          type="email"
          placeholder="nome@email.com" v-model="email"
        />
        <h5 class="my-2">Senha</h5>
        <input
          class="rounded mb-3 px-3 py-2 w-full bg-white text-background-dark"
          type="password"
          placeholder="*******" v-model="password"
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
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    validateLogin() {},
  },
};
</script>

<style scoped>
.form-container {
  padding: 4em 18em;
}
</style>
