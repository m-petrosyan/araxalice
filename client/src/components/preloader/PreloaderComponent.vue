<template>
  <Teleport to="body">
    <div class="preloader">
      <div class="loader"></div>
    </div>
  </Teleport>
</template>

<script>

export default {
  name: "PreloaderComponent",
  data() {
    return {}
  }
}
</script>

<style scoped lang="scss">
.preloader {
  position: fixed;
  z-index: 5;
  width: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

  .loader {
    border-radius: 5px;
    margin: 100px auto;
    min-height: 200px;
    padding: 20px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-width: 14.6rem;

    &:before,
    &:after {
      content: "";
      position: absolute;
      border-radius: 50%;
      animation-duration: 1.8s;
      animation-iteration-count: infinite;
      animation-timing-function: ease-in-out;
      filter: drop-shadow(0 0 1.7rem/2.25 rgba(var(--vt-c-white), 0.75));
    }

    &:before {
      width: 100%;
      padding-bottom: 100%;
      box-shadow: inset 0 0 0 1.7rem var(--vt-c-white);
      animation-name: pulsA;
    }

    &:after {
      width: calc(100% - #{1.7rem} * 2);
      padding-bottom: calc(100% - #{1.7rem} * 2);
      box-shadow: 0 0 0 0 var(--vt-c-white);
      animation-name: pulsB;
    }
  }

  @keyframes pulsA {
    0% {
      box-shadow: inset 0 0 0 1.7rem var(--vt-c-white);
      opacity: 1;
    }
    50%, 100% {
      box-shadow: inset 0 0 0 0 var(--vt-c-white);
      opacity: 0;
    }
  }

  @keyframes pulsB {
    0%, 50% {
      box-shadow: 0 0 0 0 var(--vt-c-white);
      opacity: 0;
    }
    100% {
      box-shadow: 0 0 0 1.7rem var(--vt-c-white);
      opacity: 1;
    }
  }
}


</style>