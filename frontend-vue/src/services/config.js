export const configApi = {
  baseURL: "https://iceoverflow-backend.herokuapp.com", // -> Backend Deploy//
  // baseURL: "http://127.0.0.1:8000", // -> Backend Local
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
};
