<template>
    <div id="containerPost">
        <div class="relative flex min-h-screen">
            <aside id="sidebar" class="bg-secondary text-background fixed z-50 rounded-br-md collapsed">
                <button id="toggle-sidebar" @click="toggleSidebar"
                    class="absolute top-0 -right-12 bg-secondary text-white h-12 py-1 px-4 rounded-r-md flex items-center hover:text-opacity-80 transition-opacity">
                    <span id="menu-icon" class="text-3xl">
                        &#8801;
                    </span>
                    <span id="close-icon" class="text-3xl hidden">
                        &#215;
                    </span>
                </button>

                <h1 class="text-center text-xl my-10 text-white">FILTRO</h1>
                <div class="mx-5">
                    <form>
                        <input 
                            class="rounded my-3 w-full px-3 py-2 bg-white text-background-dark text-center"
                            type="search" 
                            placeholder="DCC117" 
                        />

                        <div id="containerSelect" class="relative">
                            <v-select attach="#containerSelect" :items="items" label="Tema" solo></v-select>
                        </div>

                        <div class="grid grid-cols-2 gap-1 mb-24">
                            
                            <label 
                                for="highlights"
                                class="checkmark uppercase cursor-pointer send-button py-2 text-gray text-xs text-center bg-white"
                            >
                                Destaques
                                <input 
                                    input="highlights"
                                    name="highlights"
                                    type="checkbox"
                                    class="hidden"
                                />
                            </label>

                            <label 
                                for="news"
                                class="checkmark uppercase cursor-pointer send-button py-2 text-gray text-xs text-center bg-white"
                            >
                                Novidades
                                <input 
                                    input="news"
                                    name="news"
                                    type="checkbox"
                                    class="hidden"
                                />
                            </label>
                        </div>

                        <div>
                            <button
                                class="input send-button px-3 py-2 w-full mb-6 text-bold text-background-dark rounded bg-primary text-lg mt-1 px-1.8 py-0.8"
                                type="submit"
                            >
                                Filtrar
                            </button>
                        </div>
                    </form>
                </div>
            </aside>

            <main class="container w-[80%] py-8 mx-auto flex flex-col items-center">
                <div class="w-full flex justify-end">
                    <router-link to="/criar-post">
                        <primary-button class="uppercase w-[15rem]" content="Enviar uma pergunta" />
                    </router-link>
                </div>

                <post-details-summary
                    v-for="post in posts"
                    :key="post.id"
                    :post="post"
                />
            </main>
        </div>
    </div>
</template>

<script>
import PrimaryButton from "@/components/PrimaryButton";
import PostDetailsSummary from "@/components/PostDetailsSummary";
import PostService from "@/services/PostService";
import { toastShow } from "@/utils/vtoast";

export default {
    name: "PostsView",
    components: { PrimaryButton, PostDetailsSummary },
    data() {
        return {
            items: ['DCC', 'MAT', 'EST', 'FIS', 'QUI'],
            posts: [],
        };
    },
    methods: {
        toggleSidebar() {
            const sidebar = document.querySelector("#sidebar");
            const menuIcon = document.querySelector("#menu-icon");
            const closeIcon = document.querySelector("#close-icon");
            sidebar.classList.toggle("collapsed");
            menuIcon.classList.toggle("hidden");
            closeIcon.classList.toggle("hidden");
        },
        filter() {

        }
    },
    async created() {
        try {
            const { data: posts } = await PostService.fetchAll();
            this.posts = posts;
        } catch (error) {
            toastShow(this.$root.vtoast, error.data);
        }
    },

}
</script>

<style scoped>
#sidebar {
    transition: all 0.2s ease;
}

#sidebar.collapsed {
    transform: translateX(-100%);
    transition: all 150ms ease-in 0s;
}

#sidebar .checkmark {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    height: 2rem;
}

/* #sidebar input:checked ~ .checkmark {
    background-color: red;
} */
</style>

                                <!-- class="input send-button py-2 text-gray text-xs text-center bg-white"  -->