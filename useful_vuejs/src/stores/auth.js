import { defineStore } from "pinia";
import axios from 'axios';
import { UserModel } from "@/services/auth_service";
export const useUserStore = defineStore('users', {
  state: () => ({
    users: [],
    currentUser: null,
    loading: false,
    error: null,
    token:null
  }),
  actions: {
 
    async register(playlod)
    {
        this.loading = true;
        this.error = null;

        try{
            const response = await axios.post('http://127.0.0.1:8000/api/register',playlod);
            return response.data
        }catch(error){
            console.error("erreur lors de l'inscription"+error)
        }finally{
            this.loading = false;
        }
    },
    async login(playlod)
    {
        this.loading = true;
        this.error = null;

        try{
            const response = await UserModel.login(playlod);
            
            this.token = response.data.token
           
            return response.data
        }catch(error){
            console.error("erreur lors de la connexion"+error)
        }finally{
            this.loading = false;
        }
    }

    


    
}});