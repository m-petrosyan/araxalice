<template>
  <DeleteMessage v-if="modal.id" v-model:modal="modal" :delate="deleteQuery"/>
  <div class="portfolio-edit-preview">
    <div class="images">
      <template v-if="portfolio">
        <div class="image" v-for="image in portfolio[0].data" :key="image">
          <div class="edit-delete">
            <template v-if="!image.edit">
              <button @click="deleteImage(image.id)">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
              </button>
              <button @click="editImage(image)">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-edit">
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
              </button>
            </template>
            <button v-else @click="updateQuery(image)">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="20" height="20"
                   viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                   stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12l5 5l10 -10"/>
              </svg>
            </button>
          </div>
          <img :src="image.image" class="preview-image" alt="image"/>
          <textarea v-if="image.edit" class="edit-text" v-model="image.title"
                    placeholder="image description"/>
          <p v-else-if="image.title" class="edit-text hidden">{{ image.title }}</p>
        </div>
      </template>
    </div>
    <hr/>
    <input v-if="select" type="file" class="image-upload" multiple @change="previewImages">
    <div class="images">
      <div class="image" v-for="(image,index) in images" :key="image">
        <button class="del-img" @click="delPreview(index)">delete</button>
        <div class="image-content">
          <img :src="image.preview" class="preview-image" alt="image" ref="image"/>
          <button class="desc-toggle" @click="descriptionToggle(index)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-align-justified" width="30"
                 height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 6l16 0"/>
              <path d="M4 12l16 0"/>
              <path d="M4 18l12 0"/>
            </svg>
          </button>
          <button class="rotate" @click="rotate(index)">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise-2" width="30"
                 height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5"/>
              <path d="M5.63 7.16l0 .01"/>
              <path d="M4.06 11l0 .01"/>
              <path d="M4.63 15.1l0 .01"/>
              <path d="M7.16 18.37l0 .01"/>
              <path d="M11 19.94l0 .01"/>
            </svg>
          </button>
        </div>
        <textarea v-model="image.title" placeholder="image description" class="description" ref="description"/>
      </div>
    </div>
  </div>
</template>

<script>
import DeleteMessage from "@/components/dashboard/DeleteMessage.vue";

export default {
  name: "PortfolioEditPreview",
  components: {DeleteMessage},
  props: {
    categoryId: Number,
    select: Boolean,
  },
  data() {
    return {
      modal: {
        id: null,
        text: "image",
      },
      images: []
    }
  },
  methods: {
    descriptionToggle(index) {
      this.$refs.description[index].classList.toggle('show')
    },
    rotate(index) {
      let rotation = this.images[index].rotation

      if (rotation >= 360 - 90) {
        rotation = 0
      } else {
        rotation += 90
      }

      this.images[index].rotation = rotation
      this.$refs.image[index].style.transform = `rotate(${rotation}deg)`;
    },
    previewImages(event) {
      const files = event.target.files;
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = (event) => {
          this.images.push({file: file, preview: event.target.result, rotation: 0});
        };
        this.$emit('newImage', this.images)
        reader.readAsDataURL(file);
      }
    },
    delPreview(index) {
      this.images.splice(index, 1);
    },
    deleteImage(id) {
      this.modal.id = id
    },
    deleteQuery() {
      this.$store.dispatch('deletePortfolio', this.modal.id).then(() => {
        this.getData()
        this.modal.id = null
      })
    },
    updateQuery(image) {
      this.$store.dispatch('updatePortfolio', {id: image.id, data: {title: image.title}}).then(() => {
        this.getData()
      })
    },
    getData() {
      this.$store.dispatch('getPortfolio', {category: this.categoryId})
    },
    editImage(image) {
      this.portfolio[0].data.filter((item) => {
        if (item.id !== image.id) item.edit = false
        else image.edit = true
      })
    },
    clearImages() {
      this.images = []
      this.$emit('newImage', this.images)
      this.getData()
    },
  },
  computed: {
    portfolio() {
      return this.$store.getters.getPortfolio
    }
  },
  watch: {
    categoryId(val) {
      this.getData(val)
    },
  }
}
</script>

<style scoped lang="scss">

.portfolio-edit-preview {
  .images {
    display: flex;
    flex-wrap: wrap;
    margin-top: 30px;
    gap: 5px;

    .image {
      position: relative;
      width: 15%;
      display: flex;
      gap: 5px;
      flex-direction: column;
      @media all and (max-width: $lg) {
        width: calc(25% - 10px);
      }
      @media all and (max-width: $sm) {
        width: calc(50% - 10px);
      }

      .image-content {
        position: relative;


        button {
          position: absolute;
          bottom: 0;
          z-index: 2;

          &.rotate {
            right: 0;
          }

          &.desc-toggle {
            left: 0;
          }
        }
      }


      .del-img {
        background-color: #F44336;
        border: none;
        color: white;
        font-size: 18px;
        z-index: 2;
      }

      .description {
        display: none;

        &.show {
          display: block;
        }
      }

      &:hover {
        .edit-text.hidden {
          display: block;
        }
      }

      .edit-delete {
        z-index: 5;
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 0 10px;

        button {
          display: flex;
          align-items: center;
          justify-content: center;
          border: none;
          color: white;
          z-index: 2;
          border-radius: 100%;
          transition: .3s;

          &:hover {
            svg {
              color: orangered;
            }
          }
        }
      }

      .edit-text {
        position: absolute;
        bottom: 0;
        height: 82px;
        width: 100%;
        background-color: rgba(74, 85, 104, 0.36);
        color: white;
        border: 1px solid rgba(128, 128, 128, 0.41);
        z-index: 2;
        resize: none;

        &.hidden {
          display: none;
        }

      }

      img {
        width: 100%;
        max-height: 150px;
        object-fit: contain;
      }

      textarea {
        resize: vertical;
      }
    }
  }

  hr {
    border: none;
    border-bottom: 1px solid #343434;
    margin: 20px 0;

    &:before {
      content: 'new images';
      left: 50%;
      z-index: 1;
    }
  }
}
</style>