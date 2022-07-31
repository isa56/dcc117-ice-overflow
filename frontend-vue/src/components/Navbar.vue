<template>
  <nav
    class="items-center flex p-5 top-0 left-0 bg-secondary text-white text-lg justify-between"
  >
    <div class="items-center flex cursor-pointer" @click="redirectToHome">
      <h3>ICE Overflow</h3>
    </div>
    <div class="flex">
      <div class="items-center flex cursor-pointer" @click="redirectToProfile">
        {{ $store.getters.isAuthenticated ? "Perfil" : "Entrar" }}
        <v-icon class="ml-2" color="#F2F7FB" small>{{
          $store.getters.isAuthenticated ? "mdi-account" : "mdi-logout"
        }}</v-icon>
      </div>
      <div
        class="items-center flex cursor-pointer ml-8"
        v-if="$store.getters.isAuthenticated"
        @click="logout"
      >
        Sair
        <v-icon class="ml-2" color="#F2F7FB" small>mdi-logout</v-icon>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavBar",
  methods: {
    redirectToHome() {
      if (this.$store.getters.isAuthenticated) {
        this.$router.push({ name: "posts" }).catch(() => {});
      } else {
        this.$router.push({ name: "home" }).catch(() => {});
      }
    },
    redirectToProfile() {
      if (this.$store.getters.isAuthenticated) {
        this.$router.push({ name: "perfil", params: { id: this.$store.getters.getUserId } }).catch(() => {});
      } else {
        this.$router.push({ name: "login" }).catch(() => {});
      }
    },
    logout() {
      this.$store.commit("logout");
      this.$router.push({ name: "home" }).catch(() => {});
    },
  },
};
</script>
