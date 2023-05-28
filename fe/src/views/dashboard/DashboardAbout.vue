<template>
  <div class="db-about">
    <medium-editor
        v-model="about"
        :prefill="about.text"
        :options="options"
        :onChange="onChange"
        :hideImage="true"
        :hideGist="true"
        :hideVideo="true"
    />
    <button class="block mx-auto submit" @click="save" :disabled="loading">Login</button>
  </div>
</template>

<script>
import Editor from 'vuejs-medium-editor'

export default {
  name: "DashboardAbout",
  data() {
    return {
      content: 'lorem sssssssssssssssssss',
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
    onChange(val) {
      console.log(val)
    }
  },
  created() {
    this.$store.dispatch('getAbout')
  },
  computed: {
    about() {
      return this.$store.getters.getAbout
    }
  },
  components: {
    'medium-editor': Editor,
  },
}
</script>

<style lang="scss">
.db-about {
  .medium-editor-container {
    background-color: var(--vt-gray-black);
    color: white;
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
    margin-top: 30px;
  }
}
</style>