<script setup>
import { Link } from '@inertiajs/vue3'
import Header from './Header.vue'
import Sidebar from './Sidebar.vue'
</script>

<template>
  <main>
    <Header />
    <Sidebar />
    <article>
      <slot />
    </article>
  </main>
</template>
