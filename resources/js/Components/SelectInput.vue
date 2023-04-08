<script setup>
defineProps({
  modelValue: {
    type: String,
    required: false,
  },

  keyId: {
    type: String,
    required: false,
    default: "id",
  },

  keyValue: {
    type: String,
    required: false,
    default: "id",
  },

  keyText: {
    type: String,
    required: false,
    default: "name",
  },

  items: {
    type: Array,
    required: true,
  },
});

defineEmits(["update:modelValue"]);
</script>

<template>
  <select
    class="w-full"
    @change="$emit('update:modelValue', $event.target.value)"
  >
    <option value="" selected disabled hidden>Choose here</option>

    <option v-for="item in items" :key="item[keyId]" :value="item[keyValue]">
      {{ item[keyText] }}
    </option>
  </select>
</template>
