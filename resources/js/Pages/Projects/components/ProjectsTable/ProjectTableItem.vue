<template>
  <tr
    class="bg-white border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600"
  >
    <th
      scope="row"
      class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white"
    >
      {{ project.id }}
    </th>
    <td class="px-6 py-4">{{ project.name }}</td>
    <td class="px-6 py-4">{{ project.skill.name }}</td>
    <td class="px-6 py-4">
      <img :src="project.image" class="w-12 h-12 rounded-full" />
    </td>
    <td class="px-6 py-4 text-right flex flex-col flex-end">
      <Link
        :href="route('projects.edit', project.id)"
        class="font-medium text-blue-500 hover:text-blue-700"
        as="button"
      >
        Edit
      </Link>
      <Link
        :href="route('projects.destroy', project.id)"
        method="delete"
        as="button"
        class="font-medium text-red-500 hover:text-red-700"
      >
        Delete
      </Link>
    </td>
  </tr>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  project: Object,
});
</script>
