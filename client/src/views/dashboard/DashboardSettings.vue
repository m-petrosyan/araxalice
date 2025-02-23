<template>
  <div class="db-settings" v-if="auth">
    <ErrorMessages :error="v$" :serverError="error"/>
    <form class="form" :class="{'disabled':loading}" @submit.prevent="validateRequest">
      <div class="form-group">
        <input type="text" v-model="auth.name" placeholder="name">
      </div>
      <div class="form-group">
        <input type="email" v-model="auth.email" placeholder="email">
      </div>
      <div class="form-group">
        <input type="password" v-model="auth.password_current" placeholder="current password">
      </div>
      <div class="form-group">
        <input type="password" v-model="auth.password" placeholder="new password">
      </div>
      <div class="form-group">
        <input type="password" v-model="auth.password_re" placeholder="repeat password">
      </div>
      <div class="form-group">
        <button class="submit" :disabled="loading">Save</button>
      </div>
    </form>
  </div>
  <PreloaderComponent v-if="loading"/>
</template>

<script>
import {email, minLength, required, requiredIf, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import dashboardMixin from "@/mixins/dashboardMixin";
import {mapActions} from "vuex";

export default {
  name: "DashboardSettings",
  mixins: [dashboardMixin],
  methods: {
    ...mapActions({"action": "updateAuth"}),
    async fetchAction() {
      await this.action(this.auth);
    }
  },
  mounted() {
    this.loading = false
  },
  validations() {
    return {
      auth: {
        email: {required, email},
        name: {required, minLength: minLength(2)},
        password_current: {minLength: minLength(8)},
        password: {
          required: requiredIf(function () {
            return this.auth?.password_current
          }), minLength: minLength(8)
        },
        password_re: {
          required: requiredIf(function () {
            return this.auth?.password_current
          }), sameAs: sameAs(this.auth?.password), minLength: minLength(8)
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
.db-settings {
  .form {
    max-width: 320px;

    .submit {
      width: 100%;
    }
  }
}
</style>