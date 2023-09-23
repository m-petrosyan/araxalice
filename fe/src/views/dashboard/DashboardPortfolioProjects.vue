<template>
  <DeleteMessage v-if="modal.id" v-model:modal="modal" :delate="deleteCategoryQuery"/>
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
      <draggable v-model="categories" @change="update">
        <transition-group>
          <tr v-for="category in categories" :key="category.id">
            <td>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-move">
                <polyline points="5 9 2 12 5 15"></polyline>
                <polyline points="9 5 12 2 15 5"></polyline>
                <polyline points="15 19 12 22 9 19"></polyline>
                <polyline points="19 9 22 12 19 15"></polyline>
                <line x1="2" y1="12" x2="22" y2="12"></line>
                <line x1="12" y1="2" x2="12" y2="22"></line>
              </svg>
            </td>
            <td><p>{{ category.name }}</p></td>
            <td><p>{{ category.description }}</p></td>
            <td>
              <button class="submit sm" @click="editCategory(category)">edit</button>
              <button class="submit sm" @click="deleteCategoryAnswer(category.id)">delete</button>
            </td>
          </tr>
        </transition-group>
      </draggable>
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
          <textarea v-model="category.description" placeholder="description" rows="6"/>
        </div>
        <div class="form-group">
          <button v-if="!edit" class="submit" @click="validateRequest" :disabled="loading">
            Create
          </button>
          <template v-else>
            <button class="submit" @click="updateCategoryQuery" :disabled="loading">Update</button>
            <button class="submit" @click="cancel" :disabled="loading">Cancel</button>
          </template>
        </div>
      </div>
    </div>
  </div>
  <PreloaderComponent v-if="loading"/>
</template>

<script>
import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import useVuelidate from "@vuelidate/core";
import {minLength, required} from "@vuelidate/validators";
import DeleteMessage from "@/components/dashboard/DeleteMessage.vue";
import dashboardMixin from "@/mixins/dashboardMixin";
import {mapActions} from "vuex";
import {VueDraggableNext} from 'vue-draggable-next'


export default {
  name: "DashboardPortfolioProjects",
  mixins: [dashboardMixin],
  data() {
    return {
      edit: null,
      modal: {
        id: null,
        text: "project"
      },
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
    ...mapActions({"getData": "getCategory"}),
    ...mapActions(["createCategory", "updateCategory", "deleteCategory"]),
    async fetchAction() {
      await this.createCategory(this.category).then(() => {
        this.getData()
        this.cancel()
      })
    },
    update(data) {

      this.$store.dispatch('updateCategorySorting', {
        'id': this.categories[data.moved.oldIndex].id,
        'sorting': this.categories[data.moved.newIndex].sorting
      })
    },
    editCategory(category) {
      this.edit = true
      this.category = {...category}
    },
    updateCategoryQuery() {
      this.validateRequest("updateCategory", {id: this.category.id, data: this.category})
    },
    deleteCategoryAnswer(id) {
      this.modal.id = id
    },
    deleteCategoryQuery() {
      this.loading = true
      this.deleteCategory(this.modal.id).then(() => {
        this.modal.id = null
        this.loading = false
      })
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
    this.getData()
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
    draggable: VueDraggableNext,
    DeleteMessage,
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
          border-bottom: 2px solid #292a2c;

          &:first-child {
            cursor: move;
          }

          &:first-child, &:nth-child(2) {
            padding-right: 10px;
            border-right: 1px dotted #292a2c;
          }

          &:nth-child(3) {
            padding-left: 10px;
          }


          max-width: 800px;
          text-overflow: ellipsis;
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