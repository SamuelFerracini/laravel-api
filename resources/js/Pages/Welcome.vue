<script setup>
import { Head } from "@inertiajs/vue3";

import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import About from "@/Components/Frontend/About.vue";
import Hero from "@/Components/Frontend/Hero.vue";
</script>

<template>
  <Head title="Welcome to portfolio" />
  <FrontendLayout>
    <Hero />

    <About />
  </FrontendLayout>
</template>
