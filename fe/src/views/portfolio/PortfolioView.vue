<template>
  <div v-if="portfolio">
    <div class="category" v-for="category in portfolio" :key="category.id">
      <h1>{{ category.category }}</h1>
      <p>{{ category.description }}</p>
      <div class="wrapper">
        <div class="img" v-for="item in category.data" :key="item" @click="openImage(item)">
          <div class="image-bg" :style="{backgroundImage: `url(${item.image})`}">
            <p class="image-title">{{ item.title }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <PortfolioImageView v-if="image" :image="image"/>
  <PreloaderComponent v-if="loading"/>
</template>

<script>
import PortfolioImageView from "@/components/pottfolio/PortfolioImageView.vue";
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";

export default {
  name: "PortfolioView",
  components: {PreloaderComponent, PortfolioImageView},
  data() {
    return {
      loading: true,
      image: null,
    }
  },
  created() {
    this.getPortfolio()
  },
  methods: {
    getPortfolio() {
      this.loading = true
      this.$store.dispatch('getPortfolio', {category: this.category})
          .finally(() => this.loading = false)
    },
    openImage(image) {
      this.image = image
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
      if (to.params !== from.params) {
        this.getPortfolio()
      }
    }
  }
}
</script>

<style scoped lang="scss">
.category {
  &:not(:first-child) {
    margin-top: 50px;
  }

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
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        justify-content: center;

        .image-title {
          color: var(--vt-c-white);
        }
      }
    }
  }
}
</style>