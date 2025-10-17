import { api } from "./api";


export const UserModel = {
    register(playlod){
        const response = api.post('/register',playlod)
        return response;
    },
    login(playlod){
        const response = api.post('/login',playlod)
        return response;
    },



}