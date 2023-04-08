<template>
  <Head title="New Project" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        New Project
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="submit">
          <div>
            <InputLabel for="skill_id" value="Skill" />

            <SelectInput
              v-model="form.skill_id"
              keyId="id"
              keyValue="id"
              keyText="name"
              :items="skills"
            />

            <InputError class="mt-2" :message="form.errors.skill_id" />
          </div>

          <div class="mt-4">
            <InputLabel for="name" value="Name" />

            <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              required
              autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="project_url" value="Project URL" />

            <TextInput
              id="project_url"
              type="text"
              class="mt-1 block w-full"
              v-model="form.project_url"
              required
              autocomplete="project_url"
            />

            <InputError class="mt-2" :message="form.errors.project_url" />
          </div>

          <div class="mt-4">
            <InputLabel for="image" value="Image" />

            <FileInput
              id="image"
              class="mt-1 block w-full"
              v-model="form.image"
              required
            />

            <InputError class="mt-2" :message="form.errors.image" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Register
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import SelectInput from "@/Components/SelectInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FileInput from "@/Components/FileInput.vue";
import TextInput from "@/Components/TextInput.vue";

import { Head, useForm } from "@inertiajs/vue3";

defineProps({
  skills: Array,
});

const form = useForm({
  name: "",
  image: null,
  project_url: "",

  skill_id: null,
});

const submit = () => {
  form.post(route("projects.store"));
};
</script>
