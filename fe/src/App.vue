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
  },
  methods: {}
}
</script>
<style lang="scss">

</style>
<script setup>
import TopNavbar from "@/components/nav/TopNavbar.vue";</script>