<template>
  <div class="wrapper">
    <div class="img" v-for="(item,index) in images" :key="item" @click="openImage(index)">
      <div class="image-bg" :style="{backgroundImage: `url(${item.image})`}">
        <p class="image-title">{{ item.title }}</p>
      </div>
    </div>
  </div>
  <PortfolioImageView
      v-if="imageIndex !== null"
      :image="images[imageIndex]"
      :nextImage="nextImage"
      :openImage="openImage"/>
</template>

<script>
import PortfolioImageView from "@/components/portfolio/PortfolioImageView.vue";

export default {
  name: "PortfolioImages",
  components: {PortfolioImageView},
  data() {
    return {
      imageIndex: null
    }
  },
  props: {
    images: Object
  },
  methods: {
    openImage(index) {
      this.imageIndex = index
    },
    nextImage(bool) {
      if (bool) {
        if (this.imageIndex >= this.images.length - 1) {
          this.imageIndex = 0
        } else {
          this.imageIndex++
        }

      } else {
        if (this.imageIndex === 0) {
          this.imageIndex = this.images.length - 1
        } else {
          this.imageIndex--
        }
      }
    },
  }
}
</script>

<style scoped lang="scss">

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