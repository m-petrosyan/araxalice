<template>
  <div class="dashboard">
    <DashboardNavbar/>
    <RouterView/>
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
  padding-top: 50px;
  display: flex;
  gap: 20px 50px;
}
</style>