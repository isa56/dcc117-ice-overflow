export const configApi = {
  // baseURL: "https://.heroku.com", // -> Backend Deploy//
  baseURL: "http://127.0.0.1:8080", // -> Backend Local
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
    "X-Requested-With": "XMLHttpRequest",
  },
};
