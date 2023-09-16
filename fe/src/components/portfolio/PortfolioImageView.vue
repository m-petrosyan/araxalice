<template>
  <Teleport to="body">
    <div class="modal-container">
      <button class="close" @click="$emit('update:image',null)">x</button>
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
    image: Object
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