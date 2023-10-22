<script setup>
import { Head, Link } from '@inertiajs/vue3';
import navBar from "../shared/navBar.vue"

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    products:{
        type:Array,
        required:true
    }
});
</script>

<template>

<div>


    <navBar/>
    <div>

        <ul>
            <li v-for="product in products" :key="product.id">
               {{ product.name }}
            </li>
        </ul>
    </div>

</div>
</template>
<style>
</style>
