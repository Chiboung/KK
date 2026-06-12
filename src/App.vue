<template>
  <div id="app">
    <Header />
    
    <main style="margin-top: 64px;">
      <router-view />
    </main>
  </div>
</template>

<script setup>
import Header from './components/Header.vue';
</script>

<style>
@import './style.css';
</style>