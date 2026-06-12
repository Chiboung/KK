
<template>
  <div class="w-full min-h-screen overflow-x-hidden relative">
    
    <video
      class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"
      autoplay
      loop
      playsinline
    >
      <source src="/video3.mp4" type="video/mp4" />
    </video>

    <div class="relative z-10 flex flex-col items-center justify-start text-white text-center px-4 md:px-6 pt-32 pb-20 min-h-screen">
      
      <section class="max-w-7xl w-full px-4">
        <h1 class="text-4xl md:text-6xl font-khmer text-yellow-200 mb-2 tracking-wide drop-shadow-md">
          ទំព័រ FAQ
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-8 md:mb-12 font-khmer">
          សំនួរដែលសួរញឹកញាប់...
        </p>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
          <div 
            v-for="(image, index) in galleryImages" 
            :key="index"
            class="overflow-hidden rounded-xl shadow-2xl border border-white/10 hover:border-yellow-200/50 transition-all duration-300 transform hover:scale-[1.03]"
          >
            <img
              class="w-full h-auto object-cover aspect-[3/4]"
              :src="image.src"
              :alt="image.alt"
              loading="lazy"
            />
          </div>
        </div>
      </section>

    </div>
  </div>
</template>

