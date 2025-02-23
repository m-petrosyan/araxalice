<template>
  <div id="main-content">
    <TopNavbar :scroll="scroll"/>
    <main>
      <RouterView :scroll="scroll"/>
    </main>
    <Footer/>
  </div>
</template>

<script>
import TopNavbar from "@/components/nav/TopNavbar.vue";
import Footer from "@/components/footer/Footer.vue";

export default {
  name: "ClientLayout",
  props: {
    scroll: Number
  },
  components: {Footer, TopNavbar}
}
</script>


<style scoped lang="scss">

</style>