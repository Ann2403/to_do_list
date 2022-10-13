<template>
  <div class="flex items-center justify-center h-screen">
    <div class="bg-gray-800 flex flex-col w-80 border border-gray-900 rounded-lg px-8 py-10">
      <RegisterForm v-if="!login"></RegisterForm>
      <LoginForm @user = "getUser($event)" v-if="login"></LoginForm>
      <button @click="changForm"
              class="border mt-3 border-blue-500 bg-blue-500 text-white rounded-lg py-3 font-semibold">
        {{ textButton }}
      </button>
    </div>
  </div>
</template>

<script>
import RegisterForm from "./RegisterForm.vue";
import LoginForm from "./LoginForm.vue";

export default {
  name: "Auth",
  components: {LoginForm, RegisterForm},
  data() {
    return {
      user: null,
      login: false,
      textButton: 'Login'
    }
  },
  methods: {
    changForm() {
      this.login = !this.login;
      this.textButton = this.login ? 'Registration' : 'Login'
    },
    getUser(event) {
      this.$emit('user', event)
    }
  }
}
</script>

<style scoped>

</style>