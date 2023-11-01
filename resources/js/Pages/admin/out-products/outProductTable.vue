<script setup>
import adminLayeout from '@/Layouts/admin/adminLayeout.vue';
import Table from  '@/Components/products/Table.vue'
defineProps({
    products:Array
})

</script>

<template>
    <div>
<adminLayeout>
<Table :products ="products" />

      <PagePagination :Links="products.links" />
</adminLayeout>
    </div>
</template>
<style>

</style>


