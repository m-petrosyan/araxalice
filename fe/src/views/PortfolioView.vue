<template>
  <div class="grid">
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-5"
         style="background-image: url()"></div>
    <div class="card c-2"
         style="background-image: url()"></div>
    <div class="card c-5"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card rectangle c-5"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-1"
         style="background-image: url()"></div>
    <div class="card square c-3"
         style="background-image: url()"></div>
    <div class="card rectangle c-2"
         style="background-image: url()"></div>
    <div class="card c-5"
         style="background-image: url()"></div>
    <div class="card c-2"
         style="background-image: url()"></div>
    <div class="card c-3"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card square c-3"
         style="background-image: url()"></div>
    <div class="card c-3"
         style="background-image: url()"></div>
    <div class="card rectangle c-1"
         style="background-image: url()"></div>
    <div class="card c-1"
         style="background-image: url()"></div>
    <div class="card rectangle c-5"
         style="background-image: url()"></div>
    <div class="card c-5"
         style="background-image: url()"></div>
    <div class="card rectangle c-1"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-1"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card square c-2"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card square c-4"
         style="background-image: url()"></div>
    <div class="card square c-5"
         style="background-image: url()"></div>
    <div class="card square c-2"
         style="background-image: url()"></div>
    <div class="card c-3"
         style="background-image: url()"></div>
    <div class="card c-5"
         style="background-image: url()"></div>
    <div class="card c-4"
         style="background-image: url()"></div>
    <div class="card square c-1"
         style="background-image: url()"></div>
    <div class="card c-1"
         style="background-image: url()"></div>
    <div class="card rectangle c-2"
         style="background-image: url()"></div>
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

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
  grid-gap: 2px;
  grid-auto-rows: min-max(80px, auto);
  grid-auto-flow: dense;

  .c-1 {
    background: #1e3136;
  }

  .c-2 {
    background: #60584e;
  }

  .c-3 {
    background: #313131;
  }

  .c-4 {
    background: #60584e;
  }

  .c-5 {
    background: #545454;
  }

  .card {
    min-height: 100px;
    background-size: cover;
    background-position: 50% 50%;
  }

  .square {
    grid-column-end: span 2;
    grid-row-end: span 2;
    min-height: 200px;
  }

  .rectangle {
    grid-column-end: span 3;
    grid-row-end: span 3;
    min-height: 400px;
  }
}

</style>