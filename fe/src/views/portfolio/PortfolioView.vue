<template>
  <div class="wrapper" v-if="portfolio">
    <div v-for="category in portfolio" :key="category.id">
      <h1>{{ category.category }}</h1>
      <div class="img" v-for="item in category.data" :key="item">
        <img :src="item.image" alt="img">
      </div>
    </div>
  </div>
</template>

<script>
import image1 from '@/assets/images/portfolio/1.jpg'
import image2 from '@/assets/images/portfolio/2.jpg'
import image3 from '@/assets/images/portfolio/3.jpg'
import image4 from '@/assets/images/portfolio/4.jpg'
import image5 from '@/assets/images/portfolio/5.jpg'

export default {
  name: "PortfolioView",
  data() {
    return {
      // category: this.$route.params?.id,
      images: [
        image1,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5
      ]
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

    img {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }
}
</style>