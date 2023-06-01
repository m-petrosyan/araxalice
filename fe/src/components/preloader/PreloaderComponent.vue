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
$Loader-color: #fff;
$Loader-size: 14.6rem;
$Loader-offset: 1.7rem;
$Loader-timing: ease-in-out;


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
    max-width: $Loader-size;

    &:before,
    &:after {
      content: "";
      position: absolute;
      border-radius: 50%;
      animation-duration: 1.8s;
      animation-iteration-count: infinite;
      animation-timing-function: $Loader-timing;
      filter: drop-shadow(0 0 $Loader-offset/2.25 rgba($Loader-color, 0.75));
    }

    &:before {
      width: 100%;
      padding-bottom: 100%;
      box-shadow: inset 0 0 0 $Loader-offset $Loader-color;
      animation-name: pulsA;
    }

    &:after {
      width: calc(100% - #{$Loader-offset} * 2);
      padding-bottom: calc(100% - #{$Loader-offset} * 2);
      box-shadow: 0 0 0 0 $Loader-color;
      animation-name: pulsB;
    }
  }

  @keyframes pulsA {
    0% {
      box-shadow: inset 0 0 0 $Loader-offset $Loader-color;
      opacity: 1;
    }
    50%, 100% {
      box-shadow: inset 0 0 0 0 $Loader-color;
      opacity: 0;
    }
  }

  @keyframes pulsB {
    0%, 50% {
      box-shadow: 0 0 0 0 $Loader-color;
      opacity: 0;
    }
    100% {
      box-shadow: 0 0 0 $Loader-offset $Loader-color;
      opacity: 1;
    }
  }
}


</style>