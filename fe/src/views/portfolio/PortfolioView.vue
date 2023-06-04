<template>
  <div class="wrapper" v-if="portfolio">
    <div v-for="category in portfolio" :key="category.id">
      <h1>{{ category.category }}</h1>
      <div class="img" v-for="item in category.data" :key="item" @click="openImage(item)">
        <div class="image-bg" :style="{backgroundImage: `url(${item.image})`}">
          <p class="image-title">{{ item.title }}</p>
        </div>
      </div>
    </div>
  </div>
  <PortfolioImageView v-if="image" :image="image"/>
</template>

<script>
import image1 from '@/assets/images/portfolio/1.jpg'
import image2 from '@/assets/images/portfolio/2.jpg'
import image3 from '@/assets/images/portfolio/3.jpg'
import image4 from '@/assets/images/portfolio/4.jpg'
import image5 from '@/assets/images/portfolio/5.jpg'
import PortfolioImageView from "@/components/pottfolio/PortfolioImageView.vue";

export default {
  name: "PortfolioView",
  components: {PortfolioImageView},
  data() {
    return {
      image: null,
      images: [
        {title: 'image title', image: image1},
        {title: 'image title1', image: image1},
        {title: 'image title2', image: image2},
        {title: 'image title3', image: image5},
        {title: 'image title4', image: image4},
        {title: 'image title', image: image2},
        {title: 'image title', image: image4},
        {title: 'image title', image: image5},
        {title: 'image title', image: image2},
        {title: 'image title', image: image1},
      ]
    }
  },
  methods: {
    openImage(image) {
      this.image = image
    }
  },
  created() {
    this.getPortfolio()
  },
  methods: {
    getPortfolio() {
      this.$store.dispatch('getPortfolio', {category: this.category})
    }
  },
  computed: {
    category() {
      return this.$route.params?.id
    },
    portfolio() {
      return this.$store.getters.getPortfolio
    }
  },
  watch: {
    $route(to, from) {
      if (to.params.id !== undefined && to.params.id !== from.params.id) {
        this.getPortfolio()
      }
    }
  }
}
</script>

<style scoped lang="scss">

.wrapper {
  display: grid;
  gap: 10px;
  grid-template-columns: auto auto auto auto;

  .img {
    height: 300px;
    cursor: pointer;

    .image-bg {
      height: 100%;
      width: 100%;
      background-size: contain;
      display: flex;
      align-items: flex-end;
      justify-content: center;

      .image-title {
        color: var(--vt-c-white);
      }
    }
  }
}
</style>