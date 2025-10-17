<template>
<form @submit.prevent="login">

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</template>
<script setup>
import { useUserStore } from '@/stores/auth'
import { ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
const name = ref('')
const email = ref('')
const password = ref('')
const store = useUserStore()
const router = useRouter()
const route = useRoute()
const login = async()=>{
  await store.login({
    "email":email.value,
    "password":password.value
  })
  localStorage.setItem("usertoken",store.token)
  router.push('/')
}
</script>
<style>
</style>