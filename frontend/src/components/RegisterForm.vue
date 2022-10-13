<template>
  <Error slot="description" :errors="errors"></Error>
  <div class="text-white mt-10">
    <h1 class="font-bold text-4xl">Welcome</h1>
    <p class="font-semibold">{{textHeader}}</p>
  </div>
  <form class="flex flex-col space-y-8 mt-10" @submit.prevent="registration">
    <input type="text" placeholder="Email" v-model="email"
           class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <input type="password" placeholder="Password" v-model="password"
           class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <input type="password" placeholder="Confirm password" v-model="password_confirmation"
           class="border rounded-lg py-3 px-3 bg-gray-700 border-gray-700 placeholder-gray-500">
    <button type="submit"
        class="border border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold">
      Submit
    </button>
  </form>
</template>

<script>
import axios from "axios";
import Error from "./Error.vue";

export default {
  name: "RegisterForm",
  components: {Error},
  data() {
    return {
      email: '',
      password: '',
      password_confirmation: '',
      textHeader: 'Let\'s create your account!',
      errors: [],
    }
  },
  methods: {
    registration() {
      axios
          .post('http://localhost:48000/api/register',
              {email: this.email, password: this.password, password_confirmation: this.password_confirmation})
          .then((response) => {
            this.textHeader = 'You have successfully registered!';
            this.email = '';
            this.password = '';
            this.password_confirmation = '';
          })
          .catch((error) => {
            console.log(error);
            this.errors.push(error.response.data.message);
          })
    }
  }
}
</script>

<style scoped>

</style>