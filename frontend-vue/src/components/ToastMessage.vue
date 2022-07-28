<template>
  <v-snackbar
    :color="color"
    :timeout="timeout"
    v-model="showSnackbar"
    top
    right
    :outlined="outlined"
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
      outlined: false
    };
  },
  methods: {
    show(data) {
      this.message = data.message || "Erro";
      this.color = data.color || "success";
      this.timer = data.timer || 3000;
      this.outlined = data.outlined || false;
      this.showSnackbar = true;
    },
  },
};
</script>

<style></style>
