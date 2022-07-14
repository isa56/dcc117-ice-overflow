<template>
  <v-chip class="drop-shadow-md" :color="color" label>{{ theme }}</v-chip>
</template>

<script>
export default {
  name: "ThemeSpan",
  props: ["theme", "color"],
};
</script>

<style scoped></style>
