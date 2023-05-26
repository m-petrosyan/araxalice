<template>
  <ul class="menu">
    <li class="item">
      <router-link :to="{name:'d-portfolio'}">
        <p>Portfolio</p>
      </router-link>
    </li>
    <li class="item">
      <router-link :to="{name:'d-about'}">
        <p>About me</p>
      </router-link>
    </li>
    <li class="item">
      <router-link :to="{name:'d-settings'}">
        <p>Settings</p>
      </router-link>
    </li>
  </ul>
</template>
<script>
export default {
  name: "DashboardNavbar"
}
</script>


<style scoped lang="scss">
.menu {
  padding-right: 20px;
  border-right: 1px solid var(--vt-gray-black);
  display: flex;
  flex-direction: column;
  gap: 20px 0;

  .item {
    list-style: none;
    font-size: var(--size-l);
  }
}
</style>