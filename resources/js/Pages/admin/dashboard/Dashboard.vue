<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage} from '@inertiajs/vue3';
import adminLayeout from '@/Layouts/admin/adminLayeout.vue'
import chart from "@/Pages/admin/dashboard/charts.vue"
import { defineProps } from 'vue';

 defineProps({
  salesInfo:Array,
     totalSale:Array
})
const page = usePage()
const user = page.props.auth.user;
</script>

<template>
    <Head title="Dashboard" />
    <adminLayeout>
<chart :salesInfo="salesInfo" :user="user" />
    </adminLayeout>

</template>
