<template>
  <footer class="footer">
    <div>ICE Overflow</div>
    <div class="center-text">
      Desenvolvido por Daniel Freitas, Gabriel Bahia, Gabriel Frasson, Isadora
      Gonçalves e João Pedro Ferreira.
    </div>
    <a href="https://github.com/isa56/DCC117-2022.1-Trabalho-Mod-Sistemas" alt="Link para GitHub" class="link">
      <v-icon>github</v-icon>
    </a>
  </footer>
</template>

<script>
export default {
  name: "FooterView",
};
</script>

<style scoped>
.footer {
  align-items: center;
  background-color: #4a5e65;
  bottom: 0;
  color: #f2f7fb;
  display: flex;
  justify-content: space-between;
  left: 0;
  margin-bottom: 0;
  padding: 1.5rem;
}

.center-text {
  font-size: 0.9rem;
  text-align: center;
}

.link {
  text-decoration: none;
}
</style>
