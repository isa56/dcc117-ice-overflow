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
    "vtoast": ToastMessage,
  },
  mounted() {
    this.$root.vtoast = this.$refs.vtoast;
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
