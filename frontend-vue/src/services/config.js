export const configApi = {
  // baseURL: "https://dcc117-ice-overflow-production.up.railway.app/", // -> Backend Deploy//
  baseURL: "http://127.0.0.1:8000", // -> Backend Local
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
};
