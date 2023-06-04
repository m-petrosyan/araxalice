<template>
  <div class="not-found">
    <img :src="notFound" alt="404"/>
  </div>
</template>

<script>
import notFound from '@/assets/images/other/404.png'

export default {
  name: "NotFound",
  data() {
    return {
      notFound: notFound
    }
  }
}
</script>

<style scoped lang="scss">
.not-found {
  text-align: center;

  img {
    width: 600px;
  }
}
</style>