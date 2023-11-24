<script setup>
import adminLayeout from "../../../Layouts/admin/adminLayeout.vue";
import PagePagination from "../partial/pagePagination.vue";
import Table from "@/Components/products/Table.vue";


const prop=defineProps({
  products: Object,
});



</script>

<template>
  <div>
    <adminLayeout>
<Table :products="products"/>

      <PagePagination :Links="products.links" />
    </adminLayeout>
  </div>
</template>

