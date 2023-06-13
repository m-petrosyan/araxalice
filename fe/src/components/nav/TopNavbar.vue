<template>
  <nav ref="menu" :class="{overlay:burgerOpen}">
    <ul class="menu" :class="{overlay:burgerOpen}">
      <li class="item">
        <router-link :to="{name:'home'}">
          Home
        </router-link>
      </li>
      <li class="item">
        <router-link :to="{name:'portfolio'}">
          Portfolio
        </router-link>
        <ul class="sub-menu">
          <li class="item" v-for="item in categories" :key="item.id">
            <router-link :to="{name:'portfolio-category',params:{id: item.id}}">
              {{ item.name }}
            </router-link>
          </li>
        </ul>
      </li>
      <li class="item logo">
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
    <div class="burger-menu" :class="{close:burgerOpen}" @click="toggleBurger">
      <span></span>
    </div>
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
      burgerOpen: false,
      logo: logo,
      transformLimit: 80
    }
  },
  methods: {
    toggleBurger() {
      this.burgerOpen = !this.burgerOpen
    }
  },
  watch: {
    scroll(val) {
      val > this.transformLimit ? this.$refs.menu.classList.add('scroll') : this.$refs.menu.classList.remove('scroll')
    },
    $route() {
      this.burgerOpen = false
    },
  },
  created() {
    this.$store.dispatch('getCategory')
  },
  computed: {
    categories() {
      return this.$store.getters.getCategory
    }
  },
}
</script>

<style scoped lang="scss">
@import "src/assets/styles/vars";

nav {
  position: sticky;
  top: 0;
  display: flex;
  z-index: 3;
  font-size: var(--size-l);
  backdrop-filter: blur(5px);

  @media all and (max-width: $sm) {
    justify-content: flex-end;

    &.overlay {
      height: 100vh;
    }
  }

  &.scroll {
    background-color: var(--color-scroll);
    font-size: var(--size-xl);

    .item {
      .sub-menu {
        backdrop-filter: blur(5px);
      }
    }

    .logo {
      transform: rotate(180deg);
    }
  }

  .burger-menu {
    display: none;
    cursor: pointer;
    height: 27px;
    width: 27px;
    margin: 18px;
    overflow: visible;
    position: relative;
    z-index: 2;
    @media all and (max-width: $sm) {
      display: block;
    }

    span {
      right: 0;
      top: 13px;
      width: 27px;

      &,
      &:before,
      &:after {
        content: "";
        background: #fff;
        display: block;
        height: 4px;
        opacity: 1;
        position: absolute;
        transition: 0.3s ease-in-out;
      }

      &:before {
        right: 0;
        top: -10px;
        width: 16px;
      }

      &:after {
        right: 0;
        top: 10px;
        width: 20px;
      }
    }

    &.close span {
      transform: rotate(-45deg);
      top: 13px;
      width: 27px;
    }

    &.close span:before {
      top: 0;
      transform: rotate(90deg);
      width: 27px;
    }

    &.close span:after {
      top: 0;
      left: 0;
      transform: rotate(90deg);
      opacity: 0;
      width: 0;
    }
  }

  .menu {
    width: 800px;
    height: var(--navbar-size);
    line-height: 60px;
    margin: auto;
    color: var(--vt-c-white);
    display: flex;
    justify-content: space-between;
    @media all and (max-width: $lg) {
      width: 100%;
    }
    @media all and (max-width: $sm) {
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      z-index: 1;
      min-width: 100%;
      min-height: 100%;
      position: fixed;
      top: 0;
      height: 0;
      visibility: hidden;
      opacity: 0;
      text-align: center;
      padding-top: 20px;
      transition: all 0.3s ease-in-out;


      &.overlay {
        height: auto;
        visibility: visible;
        opacity: 1;
      }
    }

    > .item {
      width: 20%;
      text-align: center;
      list-style: none;

      &.logo {
        @media all and (max-width: $sm) {
          display: none;
        }
      }

      &:hover {
        > a {
          font-size: 24px;
        }

        .sub-menu {
          opacity: 1;
          visibility: visible;
          height: auto;
          background: var(--color-scroll);
        }
      }

      .sub-menu {
        overflow: hidden;
        transition: 1s;
        opacity: 0;
        visibility: hidden;
        height: 0;
        list-style: none;
        padding-left: 0;

        .item {
          &:hover {
            font-size: 24px;
          }
        }
      }

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