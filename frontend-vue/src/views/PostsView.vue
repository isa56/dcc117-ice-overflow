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
                    <form @submit.prevent="fetchPosts">
                        <input 
                            id="search-title"
                            class="rounded my-3 w-full px-3 py-2 bg-white text-background-dark text-center"
                            type="search" 
                            placeholder="DCC117" 
                            v-model="postTitleFilter"
                        />

                        <div id="containerSelect" class="relative max-w-[14.75rem]">
                            <v-select 
                                id="subject"
                                attach="#containerSelect"
                                :clearable="true"
                                :items="subjects"
                                v-model="selectedSubjectFilter"
                                label="Matéria"
                                solo
                            ></v-select>
                        </div>

                        <div class="grid grid-cols-2 gap-1 mb-24">
                            
                            <div class="checkbox-container">
                                <input 
                                    id="highlights"
                                    name="highlights"
                                    type="checkbox"
                                    class="bg-white"
                                    v-model="highlightsFilter"
                                />
                                <label 
                                    for="highlights"
                                    class="uppercase cursor-pointer text-gray text-xs text-center"
                                >
                                    Destaques
                                </label>
                            </div>
                            <div class="checkbox-container">
                                <input 
                                    id="recent"
                                    name="recent"
                                    type="checkbox"
                                    class="bg-white"
                                    v-model="recentFilter"
                                />
                                <label 
                                    for="recent"
                                    class="uppercase cursor-pointer text-gray text-xs text-center"
                                >
                                    Novidades
                                </label>
                            </div>
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

                <div v-if="isLoading">
                    <loading/>
                </div>
                <div v-else-if="posts.length">
                    <post-details-summary
                        v-for="post in posts"
                        :key="post.id"
                        :post="post"
                    />
                </div>
                <h1 class="text-center text-white text-2xl mt-12" v-else>Nenhuma pergunta encontrada :(</h1>
            
                <v-pagination
                    v-model="page"
                    class="my-4"
                    color="#6BBBB5"
                    :length="totalPages"
                    total-visible="6"
                ></v-pagination>
            </main>
        </div>
    </div>
</template>

<script>
import PrimaryButton from "@/components/PrimaryButton";
import PostDetailsSummary from "@/components/PostDetailsSummary";
import PostService from "@/services/PostService";
import SubjectService from "@/services/SubjectService";
import { toastShow } from "@/utils/vtoast";
import Loading from '@/components/Loading.vue';

export default {
    name: "PostsView",
    components: { PrimaryButton, PostDetailsSummary, Loading },
    data() {
        return {
            posts: [],
            subjects: [],
            selectedSubjectFilter: null,
            postTitleFilter: null,
            highlightsFilter: false,
            recentFilter: false,
            page: 1,
            totalPages: 1,
            isLoading: false
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
        async fetchPosts() {
            try {
                this.isLoading = true;

                const { data: posts, last_page } = await PostService.fetchAll(
                    this.postTitleFilter,
                    this.selectedSubjectFilter,
                    this.highlightsFilter,
                    this.recentFilter,
                    this.page
                );
                
                this.totalPages = last_page;
                this.posts = posts;
            } catch (error) {
                toastShow(this.$root.vtoast, error.data);
            } finally {
                this.isLoading = false;
            }
        }
    },
    watch: {
        async page() {
            await this.fetchPosts();
        }
    },
    async created() {
        try {
            this.isLoading = true;
            const { data: posts, last_page } = await PostService.fetchAll();

            this.totalPages = last_page;
            this.posts = posts;

            const subjects = await SubjectService.fetchAll();
            
            this.subjects = subjects;            
        } catch (error) {
            toastShow(this.$root.vtoast, error.data);
        } finally {
            this.isLoading = false;
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

#sidebar .checkbox-container {
    position: relative;
}

#sidebar .checkbox-container label {
    position: absolute;
    left: 1.5rem;
    top: 0.7rem;

    pointer-events: none;
}

#sidebar .checkbox-container input {
    -webkit-appearance: none;
    -moz-appearance: none;
    
    width: 7.25rem;
    height: 2.5rem;
    cursor: pointer;
    outline: none;
    transition: 0.2s;
}

#sidebar .checkbox-container input:hover {
    border: 1px solid #6BBBB5;
}

#sidebar .checkbox-container input:checked {
    background-color: #6BBBB5;
    border: 1px solid #5BA39D;
    transition-duration: 0.2s;
}

#sidebar .checkbox-container input:checked ~ label {
    color: #F2F7FB;
    font-weight: bold;
}
</style>