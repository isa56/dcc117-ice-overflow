import axios from "axios";
import { configApi } from "./config";
import store from "@/store";

import { toastShow } from "../utils/vtoast";

export default () => {
  const api = axios.create(configApi);

  // https://medium.com/@yaob/how-to-globally-use-axios-instance-and-interceptors-e28f351bb794
  api.interceptors.request.use(
    (config) => {
      const token = store.getters.getAuthToken;
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
    },
    (error) => {
      let message;
      if (!error.status) {
        message = "Não é possível se conectar ao servidor";
        toastShow(this.$root.vtoast, message);
      }
      return Promise.reject(error);
    }
  );

  api.interceptors.response.use(
    (response) => response,
    (error) => {
      throw new Error(error);
    }
  );

  return api;
};
