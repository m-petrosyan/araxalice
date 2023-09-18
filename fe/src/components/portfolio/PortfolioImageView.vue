<template>
  <Teleport to="body">
    <div class="modal-container">
      <button class="close" @click="openImage(null)">x</button>
      <div class="next-prew">
        <button class="prew" @click="nextImage(false)">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="72"
               height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M15 6l-6 6l6 6"/>
          </svg>
        </button>
        <button class="next" @click="nextImage(true)">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="72"
               height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 6l6 6l-6 6"/>
          </svg>
        </button>
      </div>
      <div class="modal-content">
        <div class="image">
          <img :src="image.image" alt="">
          <p class="text">{{ image.title }}</p>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<script>
export default {
  name: "PortfolioImageView",
  props: {
    image: Object,
    nextImage: Function,
    openImage: Function
  },
  mounted() {
    window.addEventListener('keydown', this.keyPress);
  },
  unmounted() {
    window.removeEventListener('keydown', this.keyPress);
  },
  methods: {
    keyPress(event) {
      if (event.keyCode === 39) {
        this.nextImage(true)
      } else if (event.keyCode === 37) {
        this.nextImage(false)
      }
    }
  }
}
</script>

<style scoped lang="scss">
.close {
  position: absolute;
  right: 2%;
  top: 5%;
  z-index: 2;
  border: none;
  color: white;
  font-size: 22px;
  background-color: #00000024;
  border-radius: 100%;
}

.next-prew {
  width: 100%;
  max-width: 1200px;
  justify-content: space-between;
  display: flex;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%);
  z-index: 2;
}

.image {
  position: relative;

  img {
    width: 100%;
    max-height: 800px;
    object-fit: contain;
  }

  .text {
    color: var(--vt-c-white);
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    text-align: center;
  }
}
</style>