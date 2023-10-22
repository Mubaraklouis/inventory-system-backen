<script setup lang="ts">
import PagePagination from "../js/pageProduct.vue"
</script>

<template>
  <div>
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
            <th scope="col" class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b">
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              Apple MacBook Pro 17"
            </th>
            <td class="px-6 py-4">20</td>
            <td class="px-6 py-4">Laptop</td>
            <td class="px-6 py-4">$2999</td>
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
          <tr class="border-b bg-gray-100">
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              Microsoft Surface Pro
            </th>
            <td class="px-6 py-4">10</td>
            <td class="px-6 py-4">Laptop PC</td>
            <td class="px-6 py-4">$1999</td>
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
          <tr class="bg-white border-b">
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              Magic Mouse 2
            </th>
            <td class="px-6 py-4">7</td>
            <td class="px-6 py-4">Accessories</td>
            <td class="px-6 py-4">$99</td>
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
          <tr class="border-b bg-gray-100">
            <th
              scope="row"
              class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
            >
              Google Pixel Phone
            </th>
            <td class="px-6 py-4">67</td>
            <td class="px-6 py-4">Phone</td>
            <td class="px-6 py-4">$799</td>
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

    <PagePagination />
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
