<template>
  <Error slot="description" :errors="errors"></Error>
  <div class="text-white mt-10">
    <h1 class="font-bold text-4xl">Welcome</h1>
  </div>
  <form class="flex flex-col space-y-8 mt-10" @submit.prevent="login">
    <input type="text" placeholder="Email" name="email" v-model="email" required
           class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <input type="password" placeholder="Password" name="password" v-model="password" required
           class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <button class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold"
            type="submit">
      Submit
    </button>
  </form>
</template>

<script>
import axios from 'axios';
import Error from "./Error.vue";

export default {
  name: "LoginForm",
  components: {Error},
  data() {
    return {
      user: null,
      email: '',
      password: '',
      errors: [],
    }
  },
  methods: {
    login() {
      axios
          .post('http://localhost:48000/api/login',
              {email: this.email, password: this.password})
          .then((response) => {
            this.user = response.data.user.email;
            localStorage.setItem('token', response.data.token.value);
            this.$emit('user', this.user)
          })
          .catch((error) => {
            this.errors.push(error.response.data.message);
          })
    }
  }
}
</script>

<style scoped>

</style>