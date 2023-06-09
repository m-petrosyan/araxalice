<template>
  <div class="db-about" v-if="about">
    <ErrorMessages :serverError="error"/>
    <div class="user-avatar">
      <label class="block avatar mx-auto" for="cover"
             :style="{backgroundImage : `url(${!preview  ? about.image ?? defaultImg: preview  })`}"/>
      <input type="file" hidden="" accept="image/*" id="cover" @change="changePicture">
    </div>
    <div v-if="!loading" class="form">
      <medium-editor
          v-model="content"
          :prefill="about.text"
          :options="options"
          :onChange="onChange"
          :hideImage="true"
          :hideGist="true"
          :hideVideo="true"
      />
      <div class="form-group">
        <button class="submit" @click="save" :disabled="loading">Save</button>
      </div>
    </div>
    <PreloaderComponent v-else/>
  </div>
</template>

<script>
import Editor from 'vuejs-medium-editor'
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import ErrorMessages from "@/components/messages/ErrorMessages.vue";
import defaultImg from "@/assets/images/other/no-pic.png"

export default {
  name: "DashboardAbout",
  data() {
    return {
      content: '',
      loading: false,
      defaultImg: defaultImg,
      preview: null,
      options: {
        toolbar: {
          buttons: [
            'bold',
            'italic',
            'underline',
            'h4',
            'h5',
            'h6',
            'unorderedlist',
          ]
        }
      }
    }
  },
  methods: {
    save() {
      const formData = new FormData
      if (this.image) formData.append('image', this.image)
      formData.append('text', this.content)
      this.$store.dispatch('updateAbout', formData)
    },
    onChange(val) {
      this.content = val
    },
    changePicture(file) {
      console.log(file.target.files[0])
      this.preview = URL.createObjectURL(file.target.files[0])
      this.image = file.target.files[0]
    },
  },
  created() {
    this.$store.dispatch('getAbout')
  },
  mounted() {
    this.content = this.about?.text
  },
  computed: {
    about() {
      return this.$store.getters.getAbout
    },
    error() {
      return this.$store.getters.getAboutError
    }
  },
  components: {
    ErrorMessages,
    PreloaderComponent,
    'medium-editor': Editor,
  },
}
</script>

<style lang="scss">
.db-about {
  .medium-editor-container {
    background-color: var(--vt-gray-black);
    color: var(--vt-c-white);
    font-size: var(--size-m);
    padding: 15px !important;
    min-width: 200px;
    min-height: 200px;

    .editor {
      &:focus {
        outline: none;
      }

      b {
        font-weight: bold;
      }
    }

    .insert-image-container {
      display: none !important;
    }
  }

  .user-avatar {
    position: relative;
    float: left;
    shape-outside: circle(50%);
    z-index: 1;
    padding-right: 5px;
    margin: 0 10px 10px 0;
    background-color: #181818;
    border-bottom-right-radius: 100%;
    border-top-right-radius: 100%;

    .avatar {
      width: 200px;
      height: 200px;
      cursor: pointer;
      display: inline-block;
      background-size: cover;
      background-position: center;
      border-radius: 100%;
    }
  }
}
</style>