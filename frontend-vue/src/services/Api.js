import axios from "axios";
import { configApi } from "./config";

export default () => {
  const api = axios.create(configApi);

  // https://www.devmedia.com.br/consumindo-uma-api-com-vue-js-e-axios/42974
  // https://medium.com/@yaob/how-to-globally-use-axios-instance-and-interceptors-e28f351bb794
  api.interceptors.request.use(
    (config) => {
      // config.headers.Authorization = `Bearer ${token}`;
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

  return api;
};
