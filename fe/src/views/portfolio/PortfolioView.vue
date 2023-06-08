<template>
  <section v-if="portfolio">
    <div class="category" v-for="category in portfolio" :key="category.id">
      <h1>{{ category.category }}</h1>
      <p>{{ category.description }}</p>
      <PortfolioImages :images="category.data"/>
    </div>
  </section>
  <PreloaderComponent v-if="loading"/>
</template>

<script>
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import PortfolioImages from "@/components/portfolio/PortfolioImages.vue";

export default {
  name: "PortfolioView",
  components: {PortfolioImages, PreloaderComponent},
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
}
</style>