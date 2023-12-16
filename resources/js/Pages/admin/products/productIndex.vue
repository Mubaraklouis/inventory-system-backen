<script setup>
import adminLayeout from "../../../Layouts/admin/adminLayeout.vue";
import PagePagination from "../partial/pagePagination.vue";
import Table from "@/Components/products/Table.vue";
import productCart from "./productCart.vue"
import {ref} from "vue";
import {usePage} from "@inertiajs/vue3";



let show = ref(false);
let cartProducts = ref([]);

//this function allows the model to be shown
function  showModel()
{
 show.value =true;
}
function  disableModel() {
  show.value = false;
}
const prop=defineProps({
  products: Object,
    allProducts:Array
});




//add to the cart function

</script>

<template>
  <div >
    <adminLayeout @add="showModel()">
    <Table :products="products"/>
        <productCart :show="show" @close="disableModel" :products="allProducts"/>
      <PagePagination :Links="products.links" />
    </adminLayeout>
  </div>
</template>

