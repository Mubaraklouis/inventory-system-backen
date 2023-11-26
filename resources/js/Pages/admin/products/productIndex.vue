<script setup>
import adminLayeout from "../../../Layouts/admin/adminLayeout.vue";
import PagePagination from "../partial/pagePagination.vue";
import Table from "@/Components/products/Table.vue";
import productCart from "./productCart.vue"
import {ref} from "vue";

let show = ref(false)

function  showModel()
{
 show.value =true;
}

const prop=defineProps({
  products: Object,
});

</script>

<template>
  <div >
    <adminLayeout @add="showModel()">
<Table :products="products"/>

        <productCart :show="show"/>

      <PagePagination :Links="products.links" />
    </adminLayeout>
  </div>
</template>

