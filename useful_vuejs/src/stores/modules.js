import { ModulesModel } from "@/services/module_services";
import { defineStore } from "pinia";

export const useModuleStore = defineStore('modules', {
  state: () => ({
    modules: [],
    currentModule: null,
    loading: false,
    error: null
  }),
  actions: {
 
    async getModules()
    {
        this.loading = true;
        this.error = null;

        try{
            const response = await ModulesModel.getModules();
            this.modules = response.data
        }catch(error){
            console.error("erreur lors de la récupération")
        }finally{
            this.loading = false;
        }
    },
    async activate(id)
    {
        this.loading = true;
        this.error = null;

        try{
            const response = await ModulesModel.activateModule(id);
            return response.data
        }catch(error){
            console.error("erreur lors de l'activation")
        }finally{
            this.loading = false;
        }
    },
    async deactivate(id)
    {
        this.loading = true;
        this.error = null;

        try{
            const response = await ModulesModel.deActivateModule(id);
            return response.data
        }catch(error){
            console.error("erreur lors de la désactivation")
        }finally{
            this.loading = false;
        }
    }   
},
  persist: {
    key: "modules_data",
    paths: ["modules"],
  },
});