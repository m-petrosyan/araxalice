<template>
  <div class="db-portfolio">
    <div class="form">
      <select v-if="categories" v-model="categoryId">
        <option v-for="category in categories" :key="category.id" :value="category.id">
          {{ category.name }}
        </option>
      </select>
      <PortfolioEditPreview :categoryId="categoryId" :select="true" @newImages="changeImages" ref="childRef"/>
      <button v-if="newImage.length" class="submit" @click="upload" :disabled="loading">Upload</button>
    </div>
  </div>
</template>

<script>
import PortfolioEditPreview from "@/components/portfolio/PortfolioEditPreview.vue";

export default {
  name: "DashboardPortfolio",
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
    })
  },
  methods: {
    upload() {
      const data = new FormData

      for (const [index, value] of Object.entries(this.newImage)) {
        data.append(`item[${index}][file]`, value['file']);
        if (value['title']) data.append(`item[${index}][title]`, value['title']);
      }
      this.$store.dispatch('createPortfolio', {id: this.categoryId, data: data}).then(() => {
        this.$refs.childRef.clearImages();
      })
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