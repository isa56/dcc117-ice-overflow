<template>
  <div id="app">
    <navbar/>
    <router-view/>
    <footer-view/>
  </div>
</template>

<script>
import NavBar from "@/components/Navbar"
import Footer from "@/components/Footer"

export default {
  components: {
    'navbar': NavBar,
    'footer-view': Footer
  }


}

</script>

<style>
#app {
  font-family: Roboto, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
