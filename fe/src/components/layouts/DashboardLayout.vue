<template>
  <div class="dashboard">
    <DashboardNavbar/>
    <main>
      <RouterView/>
    </main>
  </div>
</template>

<script>
import DashboardNavbar from "@/components/nav/DashboardNavbar.vue";

export default {
  name: "DashboardLayout",
  components: {DashboardNavbar}
}
</script>

<style scoped lang="scss">

.dashboard {
  padding-top: 30px;
  display: flex;

  main {
    width: 100%;
    padding: 0 20px;
  }
}
</style>