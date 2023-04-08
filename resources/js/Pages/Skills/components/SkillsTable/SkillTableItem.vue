<template>
  <tr
    class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600"
  >
    <th
      scope="row"
      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white"
    >
      {{ skill.id }}
    </th>
    <td class="px-6 py-4">{{ skill.name }}</td>
    <td class="px-6 py-4">
      {{ skill.image }}
    </td>
    <td class="px-6 py-4 text-right">
      <a
        href="#"
        class="font-medium text-blue-600 light:text-blue-500 hover:underline"
        >Edit</a
      >
    </td>
  </tr>
</template>

<script setup>
defineProps({
  skill: Object,
});
</script>
