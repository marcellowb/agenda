import axios from "axios";

export default {
    async get(cep){
        return await axios.get("https://cep.awesomeapi.com.br/json/"+cep, {withCredentials: false})
    },
}
