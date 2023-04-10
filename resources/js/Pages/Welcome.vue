<script setup>
import { Head } from "@inertiajs/vue3";

import ContactMe from "@/Components/Frontend/ContactMe.vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import Skills from "@/Components/Frontend/Skills.vue";
import About from "@/Components/Frontend/About.vue";
import Hero from "@/Components/Frontend/Hero.vue";

defineProps({
  skills: Object,
  projects: Object,
});
</script>

<template>
  <Head title="Welcome to portfolio" />
  <FrontendLayout>
    <Hero />

    <About />

    <Skills :skills="skills" />

    <!-- <Portfolio :skills="skills" :projects="projects" /> -->

    <ContactMe />
  </FrontendLayout>
</template>
