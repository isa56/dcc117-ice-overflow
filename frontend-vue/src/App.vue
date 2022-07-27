<template>
  <div id="app">
    <navbar />
    <router-view class="min-w-full min-h-full bg-background text-white" />
    <footer-view />
    <vtoast ref="vtoast" />
  </div>
</template>

<script>
import NavBar from "@/components/Navbar";
import Footer from "@/components/Footer";
import ToastMessage from "@/components/ToastMessage";

export default {
  components: {
    navbar: NavBar,
    "footer-view": Footer,
    vtoast: ToastMessage,
  },
  mounted() {
    this.$root["vtoast"] = this.$refs.vtoast;
    this.$route.beforeEach((to, from, next) => {
      if (
        (to.name !== "login" ||
          to.name !== "home" ||
          to.name !== "create-account") &&
        !this.$store.getters.isAuthenticated
      ) {
        console.log("redirecionando...");
        // toastShow(this.$root.vtoast, "Para acessar esse local você deve estar logado!");
        next({ name: "login" });
      } else {
        next();
      }
    });
  },
};
</script>

<style>
#app {
  font-family: Roboto, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
