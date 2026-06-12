<template>
  <div class="w-full min-h-screen overflow-x-hidden relative">
    
    <video
      class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"
      autoplay
      loop
      playsinline
    >
      <source src="/video2.mp4" type="video/mp4" />
    </video>

    <div class="relative z-10 flex flex-col items-center justify-start text-white text-center px-4 md:px-6 pt-24 pb-20 overflow-y-auto h-screen class-scroll">
      
      <section class="max-w-7xl w-full px-4">
        <h2 class="text-4xl md:text-6xl font-khmer text-yellow-200 mb-8 md:mb-12 tracking-wide drop-shadow-md">
          វិចិត្រសាល
        </h2>
        
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
<!-- <video
      class="absolute top-0 left-0 w-full h-full object-cover z-[-1]"
      autoplay
      loop
      muted
      playsinline
    >
      <source src="/video2.mp4" type="video/mp4" />
    </video> -->



<script setup>
import { ref } from 'vue';

// គ្រប់គ្រងរូបភាពទាំង ៨ សន្លឹក
const galleryImages = ref([
  { src: '/IMG_1.jpg', alt: 'រូបភាពទី ១' },
  { src: '/IMG_2.jpg', alt: 'រូបភាពទី ២' },
  { src: '/IMG_3.jpg', alt: 'រូបភាពទី ៣' },
  { src: '/IMG_4.jpg', alt: 'រូបភាពទី ៤' },
  { src: '/IMG_5.jpg', alt: 'រូបភាពទី ៥' },
  { src: '/IMG_6.jpg', alt: 'រូបភាពទី ៦' },
  { src: '/IMG_7.jpg', alt: 'រូបភាពទី ៧' },
  { src: '/IMG_1.jpg', alt: 'រូបភាពទី ៨' },
  { src: '/IMG_1.jpg', alt: 'រូបភាពទី ១' },
  { src: '/IMG_2.jpg', alt: 'រូបភាពទី ២' },
  { src: '/IMG_3.jpg', alt: 'រូបភាពទី ៣' },
  { src: '/IMG_4.jpg', alt: 'រូបភាពទី ៤' },
  { src: '/IMG_5.jpg', alt: 'រូបភាពទី ៥' },
  { src: '/IMG_6.jpg', alt: 'រូបភាពទី ៦' },
  { src: '/IMG_7.jpg', alt: 'រូបភាពទី ៧' },
  { src: '/IMG_1.jpg', alt: 'រូបភាពទី ៨' },
]);
</script>

<style scoped>
/* របារ Scrollbar បែបទំនើប */
.class-scroll::-webkit-scrollbar {
  width: 6px;
}
.class-scroll::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.1);
}
.class-scroll::-webkit-scrollbar-thumb {
  background: rgba(254, 240, 138, 0.3);
  border-radius: 4px;
}
.class-scroll::-webkit-scrollbar-thumb:hover {
  background: rgba(254, 240, 138, 0.5);
}
</style>