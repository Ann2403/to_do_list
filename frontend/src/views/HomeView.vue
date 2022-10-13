<template>
  <div>
    <Auth @user = "user = $event" v-if="!user"></Auth>
    <Cards v-if="user"></Cards>
  </div>
</template>

<script>
import Auth from "../components/Auth.vue";
import Cards from "../components/Cards.vue";

export default {
  components: {Cards, Auth},
  data() {
    return {
      user: null,
    }
  }
}
</script>
