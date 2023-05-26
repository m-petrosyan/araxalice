<template>
  <div id="main-content">
    <TopNavbar :scroll="scroll"/>

    <section>
      <RouterView :scroll="scroll"/>
    </section>
  </div>
</template>

<script>
import TopNavbar from "@/components/nav/TopNavbar.vue";

export default {
  name: "ClientLayout",
  props: {
    scroll: Number
  },
  components: {TopNavbar}
}
</script>


<style scoped lang="scss">

</style>