<template>
  <footer class="items-center bg-secondary bottom-0 text-background-dark flex justify-between left-0 mb-0 py-5 px-2 md:px-6">
    <div class="text-white md:text-start md:text-lg text-base text-center">ICE Overflow</div>
    <div class="md:text-sm md:text-start text-center text-xs">
      Desenvolvido por Daniel Freitas, Gabriel Bahia, Gabriel Frasson, Isadora
      Gonçalves e João Pedro Ferreira.
    </div>
    <a target="_blank" rel="noopener noreferrer" href="https://github.com/isa56/DCC117-2022.1-Trabalho-Mod-Sistemas" alt="Link para GitHub" class="no-underline">
      <span id="githubContainer">
        <v-tooltip attach="#githubContainer" left>
          <template v-slot:activator="{ on, attrs }">
            <v-icon v-bind="attrs" v-on="on" large>mdi-github</v-icon>
          </template>
          <span>Veja o projeto no GitHub!</span>
        </v-tooltip>
      </span>
    </a>
  </footer>
</template>

<script>
export default {
  name: "FooterView",
};
</script>
