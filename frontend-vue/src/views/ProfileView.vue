<template>
    <div class="flex flex-col px-36 py-8">
        <div class="flex flex-row bg-background-dark my-10 pt-8 p-12 rounded-md">
            <div class="flex flex-row mb-2 space-x-36">
                <h4 class="text-base text-white">Foto</h4>
                <h2 class="text-2xl text-primary font-bold">Nome</h2>
            </div>
            <div class="flex mb-2 space-x-36">
                <h3 class="text-2xl font-light">Usuário</h3>  
            </div>
        </div>
    </div>
</template>


<script>

export default {
  name: 'ProfileView',
  components: {},
  data () {
    return {
        name: "",
      
    }
  },

}
</script>

<style scoped>

</style>
