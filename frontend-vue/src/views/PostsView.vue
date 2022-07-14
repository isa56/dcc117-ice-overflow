<template>
    <div>
        <main class="container w-[80%] py-8 mx-auto flex flex-col items-center">
            <div class="w-full flex justify-end">
                <router-link to="/criar-post">
                    <primary-button class="uppercase w-[15rem]" content="Enviar uma pergunta" />
                </router-link>
            </div>

            <post-details-summary :post="post" />
            <post-details-summary :post="post" />
            <post-details-summary :post="post" />
        </main>
    </div>
</template>

<script>
import PrimaryButton from "@/components/PrimaryButton"
import PostDetailsSummary from "@/components/PostDetailsSummary"

export default {
    name: "PostsView",
    components: {PrimaryButton, PostDetailsSummary},
    data() {
        return {
            post: {
                title: "Lorem Ipsum",
                authorName: "GatinhoFeliz123",
                text: "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                upvotes: 16,
                commentsCount: 4,
                themes: [
                    { id: 1, name: "Tema 1", color: "#6BBBB5" },
                    { id: 2, name: "Tema 2", color: "#5F7D87" },
                    { id: 3, name: "Tema 3", color: "white" },
                ],
            },
        };
    },
    methods: {
        
    }
}
</script>

<style scoped>
    
</style>