<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import adminLayeout from '@/Layouts/admin/adminLayeout.vue'
import chart from "@/Pages/admin/dashboard/charts.vue"

</script>

<template>
    <Head title="Dashboard" />





    <adminLayeout>
<chart/>

    </adminLayeout>


</template>
