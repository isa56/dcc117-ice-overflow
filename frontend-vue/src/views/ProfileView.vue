<template>

  <div class="items-center flex h-auto w-auto justify-center flex-col px-36 py-8">
    <div class="bg-background-dark my-10 pt-8 p-12 rounded-md">
        <div class="flex mb-2 items-center flex-wrap">
              <div class="user-desc-style flex items-center justify-center" >
                  <img class="img-style rounded-full w-20" src="https://img.freepik.com/vetores-premium/perfil-de-avatar-de-homem-no-icone-redondo_24640-14044.jpg" alt="fotoPerfil">
                  <h1 class="name-style ml-14 text-4xl text-primary font-bold"> {{ user.name }} </h1>
              </div>
        </div>
    </div>

    <h1 class="h-style bg-background-dark mt-20 text-3xl text-primary font-bold p-1">Meus Posts</h1>

    <div 
      class="flex flex-row justify-center mt-4"
      v-if="isLoading"
    >
      <loading />
    </div>

    <PostDetailsSummary 
      v-else
      v-for="post in user.posts"
      :post="post"
      :key="post.id"
    />

  </div>
</template>

<script>
//import PostProfile from "@/components/PostProfile.vue";
import PostDetailsSummary from "@/components/PostDetailsSummary";
import UserService from "@/services/UserService";
import Loading from "@/components/Loading";
import { toastShow } from "@/utils/vtoast";

export default {
  components: { PostDetailsSummary, Loading },
  name: "ProfileView",
  data() {
    return {
      user: {},
      isLoading: false
    };
  },

  async created() {
        try {
            this.isLoading = true;

            const userId = this.$route.params.id;
            this.user = await UserService.fetchUserInfo(userId);
        } catch (error) {
            toastShow(this.$root.vtoast, error.data);
        } finally {
            this.isLoading = false;
        }
    },
};
</script>


<style scoped>

.h-style {
  white-space: nowrap;
}

@media (max-width: 1344px) {
  .user-style{
    margin-left: 5rem;
  }
}

@media (max-width: 906px) {
  .user-desc-style {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }
  .img-style {
    margin: 1rem;
  }
  .name-style {
    margin: 1rem;
  }
  .user-style{
    margin: 1rem;
  }
}

</style>
