import { api } from "./api";


export const ModulesModel = {
    getModules(){
        const response = api.get('/modules')
        return response;
    },
    activateModule(module_id){
        const response = api.post(`/modules/${module_id}/activate`)
        return response;
    },

    deActivateModule(module_id){
        const response = api.post(`/modules/${module_id}/deactivate`);
        return response;
    },

}