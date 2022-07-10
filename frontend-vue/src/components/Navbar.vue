<template>
  <nav class="items-center flex justify-between p-5 top-0 left-0 bg-primary text-white text-lg">
    <div class="items-center flex cursor-pointer" @click="redirectToHome">
      <h3>ICE Overflow</h3>
    </div>
    <div class="items-center flex cursor-pointer" @click="redirectToProfile">
      Perfil
      <v-icon class="ml-3" color="#F2F7FB" small>logout</v-icon>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  methods: {
    redirectToHome () {
      this.$router.push({name: 'home'})
    },
    redirectToProfile () {
      this.$router.push({name: 'login'})
    }
  }
}
</script>

