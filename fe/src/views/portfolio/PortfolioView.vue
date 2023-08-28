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
import PortfolioImages from "@/components/portfolio/PortfolioImages.vue";
import clientMixin from "@/mixins/clientMixin";
import {mapActions} from "vuex";

export default {
  name: "PortfolioView",
  components: {PortfolioImages},
  mixins: [clientMixin],
  data() {
    return {
      loading: true,
      image: null,
    }
  },
  methods: {
    ...mapActions({"getData": "getPortfolio"}),
    async getContent() {
      await this.getData({category: this.category});
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
        this.loading = true
        this.getContent().then(() => {
          this.loading = false
        });
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