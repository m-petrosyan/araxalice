<template>
  <main>
    <div class="contacts">
      <a class="contact" href="mailto:araxsargsyan@gmail.com">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" width="44" height="44"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 9l9 6l9 -6l-9 -6l-9 6"/>
          <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10"/>
          <path d="M3 19l6 -6"/>
          <path d="M15 13l6 6"/>
        </svg>
        <p class="info">
          araxsargsyan@gmail.com
        </p>
      </a>
      <a class="contact" href="tel:+17473429919">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="44" height="44"
             viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path
              d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"/>
          <path d="M15 7a2 2 0 0 1 2 2"/>
          <path d="M15 3a6 6 0 0 1 6 6"/>
        </svg>
        <p class="info">
          +1(747) 342-9919
        </p>
      </a>
    </div>
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
  </main>
</template>

<script>
export default {
  name: "ContactView",
  data() {
    return {
      info: {},
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
main {
  width: 35%;
  //margin: 200px auto auto auto;

  .contacts {
    display: flex;
    flex-direction: column;
    gap: 20px 0;

    .contact {
      display: flex;
      height: 30px;
      line-height: 30px;

      svg {
        height: inherit;
      }

      .info {

      }
    }
  }

  .form {
    margin-top: 50px;

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

      textarea {
        padding-top: 10px;
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
}

</style>