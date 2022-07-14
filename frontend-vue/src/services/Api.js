import axios from "axios";
import { configApi } from "./config";

export default () => {
  const api = axios.create(configApi);

  // https://medium.com/@yaob/how-to-globally-use-axios-instance-and-interceptors-e28f351bb794
  api.interceptors.request.use(
    (config) => {
      // const token =
      // if (token) {
      // config.headers.Authorization = `Bearer ${token}`;
      // }
      return config;
    },
    (error) => {
      let message;
      if (!error.status) {
        message = "Não é possível se conectar ao servidor";
        this.$root.vtoast.show({
          color: "danger",
          message: message,
          timeout: 5000,
        });
      }
      return Promise.reject(error);
    }
  );

  api.interceptors.response.use(
    (response) => {
      if (response.status === 200 || response.status === 201) {
        return Promise.resolve(response);
      } else {
        return Promise.reject(response);
      }
    },
    (error) => {
      if (error.response.status) {
        switch (error.response.status) {
          case 400:
            this.$root.vtoast.show({
              color: "danger",
              message: "Ocorreu um erro.",
              timeout: 5000,
            });
            break;
          case 401:
            this.$root.vtoast.show({
              color: "danger",
              message: "Você não está logado.",
              timeout: 5000,
            });
            break;
          case 403:
            this.$root.vtoast.show({
              color: "danger",
              message: "Você não possui essa permissão.",
              timeout: 5000,
            });
            break;
          case 404:
            this.$root.vtoast.show({
              color: "danger",
              message: "Esta página não foi encontrada.",
              timeout: 5000,
            });
            break;
          case 500:
            this.$root.vtoast.show({
              color: "danger",
              message: "Existe um erro em nosso servidor.",
              timeout: 5000,
            });
            break;
        }
      }
    }
  );

  return api;
};
