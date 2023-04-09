<template>
  <Head title="Edit Skill" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Skill
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="submit">
          <div>
            <InputLabel for="name" value="Name" />

            <TextInput
              id="name"
              type="text"
              required
              class="mt-1 block w-full"
              v-model="form.name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="image" value="Image" />

            <FileInput
              id="image"
              class="mt-1 block w-full"
              v-model="form.image"
            />

            <InputError class="mt-2" :message="form.errors.image" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Edit
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FileInput from "@/Components/FileInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
  skill: Object,
});

const form = useForm({
  _method: "put",
  name: props.skill?.name,
  image: null,
});

const submit = () => {
  form.post(route("skills.update", props.skill.id));
};
</script>
