<template>
<form @submit.prevent="register()">
    <div class="form-group">
    <label for="InputNom">Nom</label>
    <input type="text" class="form-control" id="InputNom" aria-describedby="emailHelp" placeholder="Enter name" v-model="name">
  </div>
  <div class="form-group">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
  </div>
  <div class="form-group">
    <label for="InputPassword">Password</label>
    <input type="password" class="form-control" id="InputPassword" placeholder="Password" v-model="password">
  </div>

  <button type="submit" class="btn btn-primary" :disabled="!isFormValid">Submit</button>
</form>
</template>
<script setup>
import { useUserStore } from '@/stores/auth'
import { ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import { computed } from 'vue';
const name = ref('')
const email = ref('')
const password = ref('')
const store = useUserStore()
const router = useRouter()
const route = useRoute()
const isFormValid = computed(() => {
    return name.value.trim() !== "" && email.value.trim() !== "";
});
 

  
const register = ()=>{
  const data = {
     name:name.value,
    email:email.value,
    password:password.value
  }
  console.log(data)
  try{
    store.register(data)

  }catch(err){
    console.error(err)
  }
  router.push('/login')
}


</script>
<style>
</style>