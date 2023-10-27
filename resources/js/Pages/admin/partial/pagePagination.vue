<script setup>

import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
defineProps({
    "Links" :Array
})

</script>

<template>





<div v-if="Links.length > 3" >
      <div class="flex flex-wrap mb-1 mt-5 ">
        <template v-for="(link) in Links" :key="link.id"  class="rounded-edge">

          <div class="rounded-edge">
            <Link v-if="link.url === null " class="  flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300  hover:bg-gray-100 hover:text-gray-700 "  v-html="link.label"></Link>

          <Link v-else   class="  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"  :class="{ 'flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700': link.active }" :href="link.url" v-html="link.label"></Link>

          </div>
        </template>
      </div>
    </div>



</template>

<style>
.rounded-edge:last-child{
    border-radius: 10px;
}

</style>
