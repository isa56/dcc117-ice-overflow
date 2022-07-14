  <template>

    <v-chip :color="color" label>{{theme}}</v-chip>
  
  </template>

<script>

export default {
  name: "ThemeSpan",
  post: ['theme', 'color']

}
</script>

<style scoped>


</style>
