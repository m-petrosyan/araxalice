<template>
  <div class="db-portfolio">
    <div class="form">
      <select v-if="categories" v-model="categoryId">
        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
      </select>
      <input type="file" class="image-upload" multiple @change="previewImages">
      <div class="image-preview">
        <div class="image" v-for="(image,index) in images" :key="image">
          <button class="del-img" @click="del(index)">x</button>
          <img :src="image.preview" class="preview-image" alt="image"/>
          <textarea type="text" v-model="image.title" placeholder="image description"/>
        </div>
      </div>
      <button class="submit" @click="upload" :disabled="loading">Upload</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "DashboardPortfolio",
  data() {
    return {
      categoryId: null,
      images: [],
    }
  },
  created() {
    this.$store.dispatch('getCategory')
  },
  methods: {
    previewImages(event) {
      const files = event.target.files;
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = (event) => {
          this.images.push({file: file, preview: event.target.result});
        };
        reader.readAsDataURL(file);
      }
    },
    del(index) {
      this.images.splice(index, 1);
    },
    upload() {
      const data = new FormData

      for (const [index, value] of Object.entries(this.images)) {
        data.append(`item[${index}][file]`, value['file']);
        if (value['title']) data.append(`item[${index}][title]`, value['title']);
      }
      this.$store.dispatch('createPortfolio', {id: this.categoryId, data: data})
    }
  },
  computed: {
    categories() {
      return this.$store.getters.getCategory
    },
  }
}
</script>

<style scoped lang="scss">
.image-preview {
  display: flex;
  flex-wrap: wrap;
  margin-top: 30px;

  .image {
    position: relative;
    width: 15%;
    display: flex;
    flex-direction: column;
    gap: 10px;

    .del-img {
      position: absolute;
      top: 0;
      right: 0;
      cursor: pointer;
      border: none;
      background: none;
      color: white;
      z-index: 2;
    }

    img {
      width: 100%;
      height: 150px;
      object-fit: contain;
    }

    textarea {
      resize: vertical;
    }
  }
}

</style>