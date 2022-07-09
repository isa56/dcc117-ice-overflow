<template>
  <div class="container">
    <div class="form-container">
      <h1 class="title-primary">
        ICE <span class="title-secondary">Overflow</span>
      </h1>

      <form @submit.prevent="validateLogin">

        <h5 class="input-label">E-Mail</h5>
        <input class="input" type="email" />
        <h5 class="input-label">Senha</h5>
        <input class="input" type="password" />
        <br>
        <input class="input send-button" type="submit" text="Entrar" />
        <br>
        Não possui uma conta? <router-link class="link" to="/criar-conta">Cadastre-se!</router-link>
      </form>

    </div>
  </div>
</template>

<script>
export default {
  name: "HomeView",
  data() {
    return {};
  },
  methods: {
    validateLogin() {
    },
  },
};
</script>

<style scoped>
.container {
  align-items: center;
  background-color: #232b30;
  display: flex;
  height: 100%;
  justify-content: center;
}

.form-container {
  background-color: #1b2125;
  border-radius: 1em;
  color: #f2f7fb;
  padding: 4em 18em;
  text-align: center;
}

.title-primary {
  color: #6bbbb5;
  margin-bottom: 0.8em;
}

.title-secondary {
  color: #5f7d87;
}

.input-label {
  margin: 0.5em;
}

.input {
  background-color: #f2f7fb;
  border-radius: 0.2em;
  margin-bottom: 1em;
  padding: 0.5em 1em;
  width: 18em;
}

.send-button {
  background-color: #6bbbb5;
  font-size: 1em;
  margin-top: 0.6em;
  padding: 0.8em 1.8em;
}

.link {
  color: #6bbbb5;
}

</style>
