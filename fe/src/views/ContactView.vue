<template>
  <form class="form" @submit.prevent="contact">
    <div class="form-group">
      <input type="text" name="message" v-model="data.fullname" placeholder="full name">
    </div>
    <div class="form-group">
      <input type="email" name="email" v-model="data.email" placeholder="email">
    </div>
    <div class="form-group">
      <textarea name="message" v-model="data.message" rows="10" placeholder="message"/>
    </div>
    <div class="form-group">
      <input class="submit" type="submit" value="login">
    </div>
  </form>
</template>

<script>
export default {
  name: "ContactView",
  data() {
    return {
      data: {
        fullname: '',
        email: '',
        message: ''
      }
    }
  },
  methods: {
    contact() {

    }
  }
}
</script>

<style scoped lang="scss">
.form {
  width: 50%;
  margin: 100px auto auto;

  .form-group {
    &:not(:first-child) {
      margin-top: 30px;
    }

    input, textarea {
      background-color: var(--vt-gray-black);
      border: none;
      width: 100%;
      min-height: 40px;
      padding-left: 10px;
      resize: vertical;
      color: white;
    }

    .submit {
      border: none;
      color: #636464;
      height: 40px;
      width: 150px;
      background-color: var(--vt-gray-black);
    }
  }

}
</style>