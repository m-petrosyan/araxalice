<template>
  <nav ref="menu">
    <ul class="menu">
      <li class="item">
        <router-link :to="{name:'home'}">
          Home
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'portfolio'}">
          Portfolio
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'home'}">
          <img class="logo" :src="logo" alt="logo">
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'about'}">
          About me
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'contact'}">
          Contact
        </router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
import logo from '@/assets/images/other/logo.png'

export default {
  name: "TopNavbar",
  props: {
    scroll: Number
  },
  data() {
    return {
      logo: logo,
      transformLimit: 80
    }
  },
  watch: {
    scroll(val) {
      val > this.transformLimit ? this.$refs.menu.classList.add('scroll') : this.$refs.menu.classList.remove('scroll')
    }
  },
}
</script>

<style scoped lang="scss">
nav {
  position: sticky;
  top: 0;
  z-index: 3;
  font-size: var(--size-l);
  backdrop-filter: blur(5px);

  &.scroll {
    background-color: #22222294;
    font-size: var(--size-xl);

    .logo {
      transform: rotate(180deg);
    }
  }

  .menu {
    width: 800px;
    height: var(--navbar-size);
    line-height: 60px;
    margin: auto;
    color: white;
    display: flex;
    justify-content: space-between;

    .item {
      width: 20%;
      text-align: center;
      list-style: none;

      a {
        transition: .5s;

        .logo {
          transition: .5s;
          padding-top: 10px;
          height: 100%;
        }
      }

      animation: text-focus-in 3s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
      @-webkit-keyframes text-focus-in {
        0% {
          -webkit-filter: blur(12px);
          filter: blur(12px);
          opacity: 0;
        }
        100% {
          -webkit-filter: blur(0px);
          filter: blur(0px);
          opacity: 1;
        }
      }
      @keyframes text-focus-in {
        0% {
          -webkit-filter: blur(12px);
          filter: blur(12px);
          opacity: 0;
        }
        100% {
          -webkit-filter: blur(0px);
          filter: blur(0px);
          opacity: 1;
        }
      }

    }
  }
}
</style>