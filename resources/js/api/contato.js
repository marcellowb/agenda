import api from "./api";

export default {
    async list(){
        return api.get("/contato",)
    },
    async get(id){
        return api.get(`/contato/${id}`)
    },
    async insert(form){
        return api.post('/contato', form)
    },
    async update(form, id){
        return api.put(`/contato/${id}`, form)
    },
    async delete(id){
        return api.delete(`/contato/${id}`)
    },
}
