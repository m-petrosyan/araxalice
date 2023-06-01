<template>
  <div class="wrapper">
    <div class="img" v-for="item in images" :key="item">
      <img :src="item" alt="img">
    </div>
  </div>

</template>

<script>
import image1 from '@/assets/images/portfolio/1.jpg'
import image2 from '@/assets/images/portfolio/2.jpg'
import image3 from '@/assets/images/portfolio/3.jpg'
import image4 from '@/assets/images/portfolio/4.jpg'
import image5 from '@/assets/images/portfolio/5.jpg'

export default {
  name: "PortfolioView",
  data() {
    return {
      images: [
        image1,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5,
        image1,
        image2,
        image3,
        image4,
        image5
      ]
    }
  }
}
</script>

<style scoped lang="scss">

.wrapper {
  display: grid;
  gap: 10px;
  grid-template-columns: auto auto auto auto;

  .img {
    height: 300px;

    img {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }
  }
}
</style>