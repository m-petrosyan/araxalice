<template>
  <div class="flex" :class="{minimize}">
    <ul class="menu list">
      <li class="item">
        <router-link :to="{name:'d-portfolio'}">
          <p v-if="!minimize">Portfolio</p>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-plus" width="30"
               height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M15 8h.01"/>
            <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5"/>
            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l4 4"/>
            <path d="M14 14l1 -1c.67 -.644 1.45 -.824 2.182 -.54"/>
            <path d="M16 19h6"/>
            <path d="M19 16v6"/>
          </svg>
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'d-portfolio-projects'}">
          <p v-if="!minimize">Projects</p>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="30"
               height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 4h6v6h-6z"/>
            <path d="M4 14h6v6h-6z"/>
            <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
            <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"/>
          </svg>
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'d-about'}">
          <p v-if="!minimize">About me</p>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="30"
               height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/>
            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/>
            <path d="M9 12h6"/>
            <path d="M9 16h6"/>
          </svg>
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'d-settings'}">
          <p v-if="!minimize">Settings</p>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="30"
               height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path
                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
          </svg>
        </router-link>
      </li>
      <li class="item logout">
        <div @click="logout">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="30" height="30"
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
    <ul class="menu">
      <li class="item">
        <button @click="minimizeToggle" :class="{minimize}">
          <svg v-if="!minimize" xmlns="http://www.w3.org/2000/svg"
               class="icon icon-tabler icon-tabler-arrows-diagonal-minimize-2"
               width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
               stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M18 10h-4v-4"/>
            <path d="M20 4l-6 6"/>
            <path d="M6 14h4v4"/>
            <path d="M10 14l-6 6"/>
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-diagonal" width="30"
               height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M16 4l4 0l0 4"/>
            <path d="M14 10l6 -6"/>
            <path d="M8 20l-4 0l0 -4"/>
            <path d="M4 20l6 -6"/>
          </svg>
        </button>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "DashboardNavbar",
  data() {
    return {
      minimize: false
    }
  },
  methods: {
    logout() {
      sessionStorage.clear();
      this.$router.push({name: 'login'}).then(() => this.$router.go(0))
    },
    minimizeToggle() {
      this.minimize = !this.minimize
    }
  }
}
</script>


<style scoped lang="scss">
.flex {
  display: flex;
  flex-direction: column;
  justify-content: space-between;

  &.minimize {
    .menu {
      max-width: 40px;
      padding: 0;

      button {
        padding: 0;

        &.minimize {
          transform: rotate(180deg);
        }
      }
    }
  }

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
}


</style>