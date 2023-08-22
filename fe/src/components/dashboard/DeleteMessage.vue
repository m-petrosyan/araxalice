<template>
  <Teleport to="body">
    <div class="modal-container">
      <div class="modal-content">
        <p class="text">Are you sure you want to delete {{ modal.text }}</p>
        <div class="actions">
          <button class="button submit" @click="delate">yes</button>
          <button class="button submit" @click="$emit('update:modal', {...this.modal,id : null })">no</button>
        </div>
      </div>
    </div>
  </Teleport>
</template>

<script>
export default {
  props: {
    delate: Function,
    modal: Object
  }
}
</script>

<style scoped lang="scss">
.modal-container {
  .modal-content {
    width: fit-content;

    .text {
      font-size: var(--size-l);
    }

    .actions {
      display: flex;
      gap: 0 10px
    }
  }
}
</style>