<template>
  <div class="db-portfolio-categories">
    <table v-if="categories" class="category-list">
      <thead>
      <tr>
        <th>name</th>
        <th>description</th>
        <th>actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="category in categories" :key="category.id">
        <td>{{ category.name }}</td>
        <td>{{ category.description }}</td>
        <td>
          <button class="submit sm" @click="editCategory(category)">edit</button>
          <button class="submit sm" @click="deleteCategory(category.id)">delete</button>
        </td>
      </tr>
      </tbody>
    </table>
    <PreloaderComponent v-else/>
    <div class="create">
      <ErrorMessages :error="v$" :serverError="error"/>
      <div class="form" :class="{'disabled':loading}">
        <div class="form-group">
          <input type="text" v-model="category.name" placeholder="name">
        </div>
        <div class="form-group">
          <textarea type="email" v-model="category.description" placeholder="description" rows="6"/>
        </div>
        <div class="form-group">
          <button v-if="!edit" class="submit" @click="createCategory" :disabled="loading">
            Create
          </button>
          <template v-else>
            <button class="submit" @click="updateCategory" :disabled="loading">Update</button>
            <button class="submit" @click="cancel" :disabled="loading">Cancel</button>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import ErrorMessages from "@/components/messages/ErrorMessages.vue";
import useVuelidate from "@vuelidate/core";
import {minLength, required} from "@vuelidate/validators";

export default {
  name: "DashboardPortfolioCategory",
  data() {
    return {
      edit: null,
      category: {
        name: "",
        description: ""
      },
      loading: false,
    }
  },
  validations() {
    return {
      category: {
        name: {required, minLength: minLength(2)},
        description: {minLength: minLength(2)},
      }
    }
  },
  methods: {
    createCategory() {
      this.v$.$touch()
      if (!this.v$.$error) {
        this.loading = true
        this.$store.dispatch('createCategory', this.category)
            .then(() => {
              this.$store.dispatch('getCategory')
              this.cancel()
            }).finally(() => {
          this.v$.$reset()
          this.loading = false
        })
      }
    },
    editCategory(category) {
      this.edit = true
      this.category = {...category}
    },
    updateCategory() {
      this.v$.$touch()
      if (!this.v$.$error) {
        this.loading = true
        this.$store.dispatch('updateCategory', {id: this.category.id, data: this.category})
            .then(() => {
              this.$store.dispatch('getCategory')
              this.cancel()
            })
            .finally(() => {
              this.v$.$reset()
              this.loading = false
            })
      }
    },
    deleteCategory(id) {
      this.$store.dispatch('deleteCategory', id)
    },
    cancel() {
      this.edit = false
      this.category = {
        name: "",
        description: ""
      }
    }
  },
  created() {
    this.$store.dispatch('getCategory')
  },
  mounted() {
    this.content = this.about?.text
  },
  computed: {
    categories() {
      return this.$store.getters.getCategory
    },
    error() {
      return this.$store.getters.getCategoryError
    }
  },
  components: {
    ErrorMessages,
    PreloaderComponent,
  },
  setup() {
    return {v$: useVuelidate()}
  },
}
</script>

<style lang="scss">
.db-portfolio-categories {
  .category-list {
    tbody {
      tr {
        td {
          &:first-child {
            padding-right: 10px;
            border-right: 1px dotted #292a2c;
          }

          &:nth-child(2) {
            padding-left: 10px;
          }


          max-width: 800px;
          text-overflow: ellipsis;
          white-space: nowrap;
          overflow: hidden;
        }
      }
    }
  }

  .create {
    margin-top: 50px;

    .form {
      max-width: 500px;
    }
  }

  .submit {
    margin-right: 10px;
  }
}
</style>