/* eslint-disable no-prototype-builtins */
import Api from "@/services/Api";

export default {
    async fetchAll() {
        const response = await Api().get("/api/subjects");
        
        return response.data.map(subject => subject.subject);
    }
};
