<template>
  <router-link v-if="!categories?.length" :to="{name:'d-portfolio-category'}" class="submit">
    <p>Please first create category</p>
  </router-link>
  <div class="db-portfolio" v-else>
    <div class="form">
      <select v-if="categories" v-model="categoryId">
        <option v-for="category in categories" :key="category.id" :value="category.id">
          {{ category.name }}
        </option>
      </select>
      <PortfolioEditPreview :categoryId="categoryId" :select="true" @newImages="changeImages" ref="childRef"/>
      <button v-if="newImage.length" class="submit" @click="validateRequest" :disabled="loading">Upload</button>
    </div>
  </div>
  <PreloaderComponent v-if="loading && categories?.length"/>
</template>

<script>
import PortfolioEditPreview from "@/components/dashboard/PortfolioEditPreview.vue";
import dashboardMixin from "@/mixins/dashboardMixin";
import {mapActions} from "vuex";

export default {
  name: "DashboardPortfolio",
  mixins: [dashboardMixin],
  components: {PortfolioEditPreview},
  data() {
    return {
      categoryId: null,
      newImage: [],
    }
  },
  created() {
    this.$store.dispatch('getCategory').then(() => {
      this.categoryId = this.categories[0].id
      this.loading = false
    })
  },
  methods: {
    ...mapActions({"action": "createPortfolio"}),
    async fetchAction() {
      this.loading = true
      const data = new FormData

      for (const [index, value] of Object.entries(this.newImage)) {
        data.append(`item[${index}][file]`, value['file']);
        if (value['title']) data.append(`item[${index}][title]`, value['title']);
      }

      await this.action({id: this.categoryId, data: data}).then(() => {
        this.$refs.childRef.clearImages();
      });
    },
    changeImages(images) {
      this.newImage = images;
    }
  },
  computed: {
    categories() {
      return this.$store.getters.getCategory
    },
  },
}
</script>

<style scoped lang="scss">
.db-portfolio {
  .form {
    select {
      margin-right: 30px;
    }
  }
}
</style>