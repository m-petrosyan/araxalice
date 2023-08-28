<template>
  <section v-if="!loading" class="about">
    <div class="img">
      <div class="portrait" ref="portrait" :style="{backgroundImage: `url( ${this.about?.image})`}"/>
    </div>
    <div class="text" v-html="about?.text"/>
    <div class="glitch">
    </div>
  </section>
  <PreloaderComponent v-else/>
</template>

<script>
import {mapActions} from "vuex";
import clientMixin from "@/mixins/clientMixin";

export default {
  name: 'AboutView',
  mixins: [clientMixin],
  methods: {
    ...mapActions(["getAbout"]),
    async getContent() {
      await this.getAbout()
    }
  },
  computed: {
    about() {
      return this.$store.getters.getAbout
    },
    cssVars() {
      return {
        '--image': this.about?.image,
      }
    }
  }
}</script>

<style lang="scss">

.about {
  .img {
    .portrait {
      border-radius: 100%;
      overflow: hidden;
      float: left;
      shape-outside: circle(50%);
      width: 300px;
      height: 300px;
      margin-right: 20px;
      margin-bottom: 20px;
      background-size: cover;
      background-repeat: no-repeat;
    }
  }

  @media all and (max-width: $sm) {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}

</style>
