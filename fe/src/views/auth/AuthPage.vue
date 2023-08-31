<template>
  <div class="d-settings">
    <ErrorMessages :error="v$" :serverError="error"/>
    <form v-if="!loading" class="form" :class="{'disabled':loading}" @submit.prevent="signIn">
      <div class="form-group">
        <input type="email" v-model="form.username" placeholder="email">
      </div>
      <div class="form-group">
        <input type="password" v-model="form.password" placeholder="password">
      </div>
      <div class="form-group">
        <button class="submit" :disabled="loading">Login</button>
      </div>
    </form>
    <PreloaderComponent v-else/>
  </div>
</template>

<script>

import PreloaderComponent from "@/components/preloader/PreloaderComponent.vue";
import ErrorMessages from "@/components/messages/ErrorMessages.vue";
import {email, minLength, required} from '@vuelidate/validators'
import useVuelidate from "@vuelidate/core";

export default {
  name: "AuthPage",
  components: {ErrorMessages, PreloaderComponent},
  data() {
    return {
      loading: false,
      form: {
        username: '',
        password: ''
      }
    }
  },
  setup() {
    return {v$: useVuelidate()}
  },
  validations() {
    return {
      form: {
        username: {required, email},
        password: {required, minLength: minLength(8)},
      }
    }
  },
  methods: {
    signIn() {
      this.v$.$touch()
      this.loading = true
      if (!this.v$.$error) {
        this.$store.dispatch('signIn', this.form)
            .then(() => {
              this.$store.dispatch('auth').then(() => {
                this.$router.push({name: 'd-portfolio'})
              })
            })
            .finally(() => this.loading = false)
      }
    }
  },
  computed: {
    error() {
      return this.$store.getters.getAuthError
    }
  },
}
</script>

<style scoped lang="scss">
.d-settings {
  margin: 150px auto auto auto;
  width: fit-content;

  .form {
    margin: 50px auto auto;
    width: fit-content;

    input {
      width: 250px;
    }

    .submit {
      width: 100%;
    }
  }
}
</style>