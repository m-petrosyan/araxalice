<template>
  <div class="db-about" v-if="about">
    <ErrorMessages :serverError="error"/>
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
        <button class="block mx-auto submit" @click="save" :disabled="loading">save</button>
      </div>
    </div>
    <PreloaderComponent v-else/>
  </div>
</template>

<script>
import Editor from 'vuejs-medium-editor'
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import ErrorMessages from "@/components/messages/ErrorMessages.vue";

export default {
  name: "DashboardAbout",
  data() {
    return {
      content: '',
      loading: false,
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
      this.$store.dispatch('updateAbout', {text: this.content})
    },
    onChange(val) {
      this.content = val
    }
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

  .submit {

  }
}
</style>