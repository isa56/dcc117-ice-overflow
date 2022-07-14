<template>
  <v-snackbar
    :color="color"
    :timeout="timeout"
    v-model="showSnackbar"
    top
    right
    >{{ message }}</v-snackbar
  >
</template>

<script>
export default {
  name: "ToastMessage",
  data() {
    return {
      showSnackbar: false,
      message: "",
      color: "success",
      timeout: 3000,
    };
  },
  methods: {
    show(data) {
      this.message = data.message || "Erro";
      this.color = data.color || "success";
      this.timer = data.timer || 3000;
      this.showSnackbar = true;
    },
  },
};
</script>

<style></style>
