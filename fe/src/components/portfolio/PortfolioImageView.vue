<template>
  <Teleport to="body">
    <div class="image-content">
      <div class="image-info">
        <div class="image">
          <button class="close" @click="$emit('update:image',null)">x</button>
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
.image-content {
  position: fixed;
  z-index: 5;
  width: 100%;
  height: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(24, 24, 24, 0.96);

  .image-info {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width: 80%;
    max-width: 1200px;
    height: fit-content;

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

      .close {
        position: absolute;
        right: 5px;
        top: 5px;
        z-index: 2;
        border: none;
        color: white;
        font-size: 22px;
        background-color: #00000024;
        border-radius: 100%;
        cursor: pointer;
      }
    }
  }


}
</style>