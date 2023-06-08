<template>
  <section v-if="about" class="about">
    <div class="img">
      <div class="portrait" ref="portrait"/>
    </div>
    <div class="text" v-html="about.text"/>
    <div class="glitch">
    </div>
  </section>
</template>
<script>
export default {
  name: 'AboutView',
  created() {
    this.$store.dispatch('getAbout').then(() => {
      this.$refs.portrait.style.setProperty('--profile_pic', `url( ${this.about.image})`);
    })
  },
  computed: {
    about() {
      return this.$store.getters.getAbout
    },
    cssVars() {
      return {
        '--image': this.about.image,
      }
    }
  }
}</script>

<style lang="scss">
.about {
  .img {
    .portrait {
      position: relative;
      border-radius: 100%;
      overflow: hidden;
      float: left;
      shape-outside: circle(50%);
      width: 300px;
      height: 300px;
      margin-right: 20px;
      margin-bottom: 20px;
      background-image: var(--profile_pic);
      background-size: contain;
      background-repeat: no-repeat;

      &:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: var(--profile_pic);
        background-size: contain;
        background-repeat: no-repeat;
        opacity: .5;
        animation: glitch 10s linear infinite;

        @keyframes glitch {
          0% {
            background-position: 0 0;
            filter: hue-rotate(0deg);
          }
          10% {
            background-position: 15px 0;
          }
          15% {
            background-position: -15px 0;
          }
          20% {
            filter: hue-rotate(360deg);
          }
          25% {
            background-position: 0 0;
            filter: hue-rotate(0deg);
          }
          100% {
            background-position: 0 0;
            filter: hue-rotate(0deg);
          }
        }
      }
    }
  }
}

</style>
