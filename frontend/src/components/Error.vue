<template>
  <div id="notifications">
    <div class="alert alert-danger" v-for="(error, index) in errors" :key="index">
      <div class="container">
        <button
            type="button"
            aria-hidden="true"
            class="close"
            @click="event => removeNotify(event, 'alert-danger')"
        >
        </button>
        <div class="alert-icon">
        </div>
        {{error}}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Error",
  props: ['errors'],
  methods: {
    removeNotify(e, notifyClass) {
      var target = e.target;
      while (target.className.indexOf(notifyClass) === -1) {
        target = target.parentNode;
      }
      return target.parentNode.removeChild(target);
    }
  },
}
</script>

<style scoped>

</style>