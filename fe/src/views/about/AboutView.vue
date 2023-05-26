<template>
  <div class="about">
    <h1>This is an about page</h1>
    <div v-html="about?.text"/>
  </div>
</template>
<script>
export default {
  name: 'AboutView',
  created() {
    this.$store.dispatch('getAbout')
  },
  computed: {
    about() {
      return this.$store.getters.getAbout
    }
  }
}
</script>

<style>

</style>
