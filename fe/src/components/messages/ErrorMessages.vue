<template>
  <div v-if="(error?.$dirty && error.$error) || serverError" class="errors flex gap-x-3 mx-auto rounded">
    <div class="messages">
      <div v-if="error?.$dirty && error.$error">
        <p v-for="error of error.$errors" :key="error.$uid">
        <span class="lowercase">
          <span class="font-medium">{{ error.$property }}</span>
          <span>{{ ' ' + error.$message.replace("This field", "") }}</span>
        </span>
        </p>
      </div>
      <p v-else>
        {{ serverError }}
      </p>
    </div>
  </div>
</template>

<script>

export default {
  name: "ErrorMessages",
  props: {
    error: Object,
    serverError: String,
  }
}
</script>

<style scoped lang="scss">
.messages {
  border: 2px solid var(--color-alert);
  color: var(--color-alert);
  margin-bottom: 30px;
  display: inline-block;
  padding: 10px;
}
</style>