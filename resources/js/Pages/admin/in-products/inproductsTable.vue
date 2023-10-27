<script setup>
import adminLayeout from "../../../Layouts/admin/adminLayeout.vue"
import PagePagination from "../partial/pagePagination.vue"
import { Link } from "@inertiajs/vue3";

 defineProps({
    products:Object
})


</script>

<template>
  <div>
   <adminLayeout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mr-16">
      <table class="w-full text-sm text-left text-gray-500">
        <thead
          class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary"
        >
          <tr>
            <th scope="col" class="px-6 py-3">Product name</th>
            <th scope="col" class="px-6 py-3">QTY</th>
            <th scope="col" class="px-6 py-3">Category</th>
            <th scope="col" class="px-6 py-3">Price</th>
            <th scope="col" class="px-6 py-3">serial no</th>
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>

          <tr v-for="product in products.data" :key="product.id"  class="bg-white border-b">

            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
           <Link :href="route('product.show',product.id)">  {{ product.name }}</Link>
            </th>
            <td class="px-6 py-4">{{ product.quantity }}</td>
            <td class="px-6 py-4">Laptop</td>
            <td class="px-6 py-4">{{ product.price }}</td>
            <td class="px-6 py-4">{{ product.serial_number }}</td>
            <td class="px-6 py-4">
              <div class="flex gap-4">
                <div
                  class="font-medium text-white hover:underline bg-red-400 p-2 rounded-md"
                >
                  <img class="w-4 h-4" src="/icons/trash.png" alt="" />
                </div>
                <div
                  class="font-medium text-white hover:underline table-primary p-2 rounded-md"
                >
                  <img class="w-4 h-4" src="/icons/file-edit.png" alt="" />
                </div>
              </div>
            </td>


          </tr>
        </tbody>
      </table>
    </div>

    <PagePagination :Links="products.links" />
   </adminLayeout>
  </div>
</template>

<script setup lang="ts"></script>
<style scoped>
.table-secondary {
  background-color: #cecbf7;
}
.table-primary {
  background-color: #b086f3;
}
</style>
