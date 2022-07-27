<template>

  <div class="items-center flex h-auto w-auto justify-center flex-col px-36 py-8">
    <div class="bg-background-dark my-10 pt-8 p-12 rounded-md">
        <div class="flex mb-2 items-center flex-wrap">
              <div class="user-desc-style flex mb-7" >
                  <img class="img-style rounded-full w-20" src="https://img.freepik.com/vetores-premium/perfil-de-avatar-de-homem-no-icone-redondo_24640-14044.jpg" alt="fotoPerfil">
                  <h1 class="name-style ml-14 text-4xl text-primary font-bold"> {{ name }} </h1>
                  <h3 class="user-style ml-96 text-2xl text-primary font-normal"> {{ userName }} </h3>                  
              </div>
            <span class="text-base text-white">{{ description }}</span>
        </div>
    </div>

    <h1 class="h-style bg-background-dark mt-20 text-2xl text-primary font-bold p-1">Meus Posts:</h1>

    <PostProfile 
    v-for="post in posts"
    :post="post"
    :key="post.id" />

  </div>
</template>

<script>
import PostProfile from "@/components/PostProfile.vue";
import UserService from "@/services/UserService";
import { toastShow } from "@/utils/vtoast";

export default {
  components: { PostProfile },
  name: "ProfileView",
  data() {
    return {
      name: 'Joãozinho da Silva',
      userName: '@Joaozinho',
      description: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",  

      posts:[
          {
            title: "Lorem Ipsum",
            text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
          },
          {
            title: "Lorem Ipsum",
            text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
          },

          {
            title: "Lorem Ipsum",
            text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
          },
      ],

    };
  },

  async created(userId) {
        try {
            const { data: user } = await UserService.fetchUserInfo(userId);
            this.name = user.name;
            this.userName = user.userName;
            this.description = user.description;
            this.posts = user.posts;
        } catch (error) {
            toastShow(this.$root.vtoast, error.data);
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
