<template>
  <input
    accept="image/png, image/gif, image/jpeg"
    type="file"
    required
    @input="$emit('update:modelValue', $event.target.files[0])"
  />
</template>
<script setup>
defineProps({
  modelValue: {
    type: File,
    required: false,
  },
});

defineEmits(["update:modelValue"]);
</script>
