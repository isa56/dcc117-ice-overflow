<template>
  <div class="items-center bg-background flex h-full justify-center">
    <div class="bg-background-dark text-white rounded-lg w-[90%]">
      <div class="flex">
        <div class="flex-1 flex flex-col items-center justify-between p-4 min-h-full">
          <div class="flex flex-col items-center mb-8">
            <h1 class="text-primary text-dx1 mb-1 text-bottom text-center text-5xl">
              ICE <span class="text-secondary">Overflow</span>
            </h1>
            <p class="max-w-[15rem] text-center">Encontre as respostas para os seus problemas!</p>
          </div>
          <div class="flex flex-col items-center">
            <router-link class="w-[14rem]" :to="$store.getters.isAuthenticated ? '/posts' : '/login'">
              <primarybutton content="Entrar"/>
            </router-link>
            <small class="text-center mt-1" v-if="!$store.getters.isAuthenticated">
              Não possui uma conta? <router-link class="text-primary" to="/criar-conta">Cadastre-se!</router-link>
            </small>
          </div>
        </div>
        <div id= "img-home" class="bg-no-repeat bg-right-bottom min-h-[28rem]">
          <img src="../assets/img/iceImagem.jpg" class="object-cover h-full w-full">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PrimaryButton from "@/components/PrimaryButton"

export default {
  name: "HomeView",
  components: {
    'primarybutton': PrimaryButton,
  },
  data() {
    return {

    }
  }
}
</script>

<style scoped>
@media only screen and (max-width: 768px) {
    #img-home {
        display: none;
    }
}
</style>