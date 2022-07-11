<template>
    <button 
        class="bg-primary w-full h-[3rem] rounded-lg hover:bg-primary-dark transition-colors"
        @click="onClick"
    >
        {{ content }}
    </button>
</template>

<script>
export default {
    name: "PrimaryButton",
    props: {
        content: String,
        onClick: Function
    },
    data() {
        return {};
    }
}
</script>

<style scoped>
    
</style>