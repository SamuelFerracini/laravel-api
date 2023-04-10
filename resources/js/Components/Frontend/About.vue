<template>
  <section id="about" class="section bg-light-secondary dark:bg-dark-secondary">
    <div
      class="container mx-auto"
      :initial="{
        opacity: 0,
        y: 100,
      }"
      :visible="{
        opacity: 1,
        y: 0,
      }"
    >
      <div class="flex flex-col xl:flex-row gap-24">
        <img
          class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl"
          src="http://localhost:8000/img/about.jpeg"
          alt="about"
        />
        <div
          class="flex flex-col items-center text-center lg:items-start lg:text-left"
        >
          <div class="flex flex-col">
            <h2 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3">
              About Me
            </h2>
            <p class="mb-4 text-accent">Fullstack developer</p>
            <hr class="mb-8 opacity-90 dark:opacity-5" />
            <p class="mb-8">
              Highly motivated and skilled strong Software Developer with 4+
              years of commercial experience in software development. Passionate
              about logical problem solving has a good understanding of Front
              End and Back End sides with more focus on TypeScript. Designed and
              developed highly scalable applications with microservice
              architecture using and consuming either AWS or Docker environment.
              Participated in various projects either from scratch or already
              ongoing ones, worked with different technologies and teams. <br />
              <br />
              Motivated by new challenges, eager to learn and grow
              professionally and dive deeper into top-notch technologies.
              Flexible and can easily adjust to new approaches. A friendly and
              easy-going person, always ready to support and share knowledge,
              and a good team player.
            </p>
          </div>
          <a href="#contact" class="btn btn-md bg-accent text-light-tail-100">
            Contact me
          </a>
        </div>
      </div>
    </div>
  </section>
</template>
