<template>
  <RouterView :scroll="scroll"/>
</template>

<script>
export default {
  data() {
    return {
      scroll: 0
    }
  },
  mounted() {
    window.addEventListener('scroll', () => this.scroll = window.top.scrollY);

    if (sessionStorage.getItem('token')) {
      this.$store.dispatch('auth').catch(() => this.$router.push({name: 'auth'}))
    }
  },
  methods: {}
}
</script>
<style lang="scss">

</style>
