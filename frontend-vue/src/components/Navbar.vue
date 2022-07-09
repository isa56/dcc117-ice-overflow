<template>
  <nav class="navbar">
    <div class="navbtn" @click="redirectToHome">
      <h3>ICE Overflow</h3>
    </div>
    <div class="navbtn" @click="redirectToProfile">
      Perfil
      <v-icon class="icon" color="#F2F7FB" small>logout</v-icon>
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


<style scoped>
.navbar {
  align-items: center;
  background-color: #4A5E65;
  color: #F2F7FB;
  display: flex;
  justify-content: space-between;
  padding: 1.5rem;
  top: 0;
  left: 0;
}

.navbtn {
  align-items: center;
  display: flex;
  cursor: pointer;
}

.icon {
  margin-left: 0.3em;
}

</style>
