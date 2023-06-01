<template>
  <div class="d-settings">
    <ErrorMessages :error="v$" :serverError="error"/>
    <form class="form" :class="{'disabled':loading}" @submit.prevent="save">
      <div class="form-group">
        <input type="text" v-model="form.name" placeholder="name">
      </div>
      <div class="form-group">
        <input type="email" v-model="form.email" placeholder="email">
      </div>
      <div class="form-group">
        <input type="password" v-model="form.password_current" placeholder="current password">
      </div>
      <div class="form-group">
        <input type="password" v-model="form.password" placeholder="new password">
      </div>
      <div class="form-group">
        <input type="password" v-model="form.password_re" placeholder="repeat password">
      </div>
      <div class="form-group">
        <button class="block mx-auto submit" @click="save" :disabled="loading">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
import {email, minLength, requiredIf, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import ErrorMessages from "@/components/messages/ErrorMessages.vue";
import dashboardMixin from "@/mixins/dashboardMixin";

export default {
  name: "DashboardSettings",
  mixins: [dashboardMixin],
  components: {ErrorMessages},
  data() {
    return {
      form: {
        name: '',
        email: '',
        password_current: '',
        password: '',
        password_re: '',
      },
    }
  },
  methods: {
    save() {
      this.submit().then(() => {
        this.loading = true
        this.$store.dispatch('auth').then(() => {
        }).finally(() => this.loading = false)
      })
    }
  },
  validations() {
    return {
      form: {
        email: {email},
        name: {minLength: minLength(2)},
        password_current: {minLength: minLength(8)},
        password: {
          required: requiredIf(function () {
            return this.form.password_current
          }), minLength: minLength(8)
        },
        password_re: {
          required: requiredIf(function () {
            return this.form.password_current
          }), sameAs: sameAs(this.form.password), minLength: minLength(8)
        }
      }
    }
  },
  computed: {
    auth() {
      return this.$store.getters.getAuth
    },
    error() {
      return this.$store.getters.getAuthError
    }
  },
  setup() {
    return {v$: useVuelidate()}
  },
}
</script>

<style scoped lang="scss">
.form {
  width: 320px;
  margin-top: 50px;

  .submit {
    width: 100%;
  }
}
</style>