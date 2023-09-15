<template>
  <ul class="menu">
    <li class="item">
      <router-link :to="{name:'d-portfolio'}">
        <p>Portfolio</p>
      </router-link>
    </li>
    <li class="item">
      <router-link :to="{name:'d-portfolio-projects'}">
        <p>Projects</p>
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
    <li class="item logout">
      <div @click="logout">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="36" height="36"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"/>
          <path d="M15 12h-12l3 -3"/>
          <path d="M6 15l-3 -3"/>
        </svg>
      </div>
    </li>
  </ul>
</template>
<script>
export default {
  name: "DashboardNavbar",
  methods: {
    logout() {
      sessionStorage.clear();
      this.$router.push({name: 'login'}).then(() => this.$router.go(0))
    }
  }
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

    &.logout {
      cursor: pointer;
    }
  }
}
</style>