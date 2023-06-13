<template>
  <div class="wrapper">
    <div class="img" v-for="item in images" :key="item" @click="openImage(item)">
      <div class="image-bg" :style="{backgroundImage: `url(${item.image})`}">
        <p class="image-title">{{ item.title }}</p>
      </div>
    </div>
  </div>
  <PortfolioImageView v-if="image" v-model:image="image"/>
</template>

<script>
import PortfolioImageView from "@/components/portfolio/PortfolioImageView.vue";

export default {
  name: "PortfolioImages",
  components: {PortfolioImageView},
  data() {
    return {
      image: null
    }
  },
  props: {
    images: Object
  },
  methods: {
    openImage(image) {
      this.image = image
    }
  }
}
</script>

<style scoped lang="scss">
@import "src/assets/styles/vars";

.wrapper {
  display: grid;
  gap: 10px;
  grid-template-columns: auto auto auto auto;

  @media all and (max-width: $lg) {
    gap: 15px;
    grid-template-columns: auto auto auto;
  }

  @media all and (max-width: $sm) {
    grid-template-columns: auto;
  }

  .img {
    height: 300px;
    cursor: pointer;

    .image-bg {
      position: relative;
      height: 100%;
      width: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      //transition: all 1s;

      &:hover {
        animation: move .5s linear;
        @keyframes move {
          0% {
            opacity: 1;
          }
          20% {
            opacity: 1;
          }
          70% {
            opacity: 0;
          }
          90% {
            opacity: 1;
          }
          10% {
            opacity: 1;
          }
        }

        .image-title {
          visibility: visible;
          opacity: 1;
        }
      }

      .image-title {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        transition: .3s;
        left: 15px;
        bottom: 10px;
        color: var(--vt-c-white);
        max-width: 90%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }
    }
  }
}
</style>