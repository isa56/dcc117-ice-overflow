<template>
  <nav
    class="items-center flex p-5 top-0 left-0 bg-secondary text-white text-lg justify-between"
  >
    <div class="items-center flex cursor-pointer" @click="redirectToHome">
      <h3>ICE Overflow</h3>
    </div>
    <div class="flex">
      <div class="items-center flex cursor-pointer" @click="redirectToProfile">
        Perfil
        <v-icon class="ml-3" color="#F2F7FB">{{
          $store.getters.isAuthenticated ? "person" : "logout"
        }}</v-icon>
      </div>
      <div class="items-center flex cursor-pointer ml-8" v-if="$store.getters.isAuthenticated" @click="logout">
        Sair
        <v-icon class="ml-3" color="#F2F7FB">logout</v-icon>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavBar",
  methods: {
    redirectToHome() {
      this.$router.push({ name: "home" });
    },
    redirectToProfile() {
      if (this.$store.getters.isAuthenticated) {
        this.$router.push({ name: "perfil" });
      } else {
        this.$router.push({ name: "login" });
      }
    },
    logout() {
      this.$store.commit("logout");
        this.$router.push({ name: "home" });
    }
  },
};
</script>
