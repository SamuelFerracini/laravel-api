<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 light:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400"
      >
        <tr>
          <th scope="col" class="px-6 py-3">Id</th>
          <th scope="col" class="px-6 py-3">Name</th>
          <th scope="col" class="px-6 py-3">Skill</th>
          <th scope="col" class="px-6 py-3">Image</th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
        </tr>
      </thead>
      <tbody>
        <ProjectTableItem v-for="project in projects" :project="project" />
      </tbody>
    </table>
  </div>
</template>

<script setup>
import ProjectTableItem from "./ProjectTableItem.vue";

defineProps({
  projects: Array,
});
</script>
