<template>
  <Teleport to="body">
    <div class="image-content">
      <div class="image" :style="{backgroundImage: `url(${image.image})`}">
        <button class="close">x</button>
        <p class="text">{{ image.title }}</p>
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

  .image {

    position: relative;
    margin: auto;
    width: 800px;
    height: 600px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #4a5568;
    padding: 10px;

    .text {
      color: var(--vt-c-white);
    }

    .close {
      position: absolute;
      right: 0;
      top: 0;
    }
  }
}
</style>