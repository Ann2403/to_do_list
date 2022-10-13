<template>

</template>

<script>
import axios from "axios";

export default {
  name: "Cards",
  data() {
    return {
      cards: [],
    }
  },
  created: function() {
    axios
        .get('http://localhost:48000/api/v1/cards')
        .then((response) => {
          this.cards = response.data.cards;
          this.$emit('user', this.user)
        })
        .catch((error) => {
          this.errors.push(error.data);
        })
  }
}
</script>

<style scoped>

</style>