<script setup>
const socials = [
  {
    name: "Github",
    link: "https://github.com/SamuelFerracini",
    icon: "http://localhost:8000/img/github.png",
  },

  {
    name: "Linkedin",
    link: "https://www.linkedin.com/in/samuel-ferracini/",
    icon: "http://localhost:8000/img/linkedin.png",
  },
];
</script>
<template>
  <section
    id="home"
    class="lg:h-[85vh] flex items-center bg-light-primary dark:bg-dark-primary py-32 lg:py-0 overflow-hidden"
  >
    <div
      class="container mx-auto h-full"
      v-motion
      :initial="{
        opacity: 0,
        y: 100,
      }"
      :visible="{
        opacity: 1,
        y: 0,
      }"
    >
      <div class="flex flex-col md:flex-row items-center h-full pt-8">
        <div class="flex-1 flex flex-col items-center lg:items-start">
          <p class="text-lg text-accent text-md mb-[22px]">Hey, I'm Sam! 👋</p>
          <h1
            class="text-4xl leading-[44px] md:text-5xl md:leading-tight lg:text-7xl lg:leading-[1.2] font-bold md:tracking-[-2px]"
          >
            I Design & Build <br />
            Solutions.
          </h1>
          <p
            class="pt-4 pb-8 md:pt-6 md:pb-12 max-w-[480px] text-lg text-center lg:text-left"
          >
            It is my passion to help people overcome their challenges and
            simplify their lives using code.
          </p>
          <div>
            <h5
              class="text-lg flex justify-center lg:justify-start items-center text-black dark:text-white mb-2"
            >
              Follow me on
            </h5>
            <div class="flex items-center mb-6">
              <a
                v-for="social in socials"
                class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-black dark:text-white hover:bg-light-secondary hover:border-light-secondary dark:hover:bg-dark-secondary dark:hover:border-dark-secondary mr-3 sm:mr-4"
                :href="social.link"
              >
                <img :src="social.icon" :alt="`${social.name} logo`" />
              </a>
            </div>
          </div>
        </div>
        <div class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0">
          <img
            class="rounded-lg"
            src="http://localhost:8000/img/hero.jpg"
            alt="Hero"
          />
        </div>
      </div>
    </div>
  </section>
</template>
