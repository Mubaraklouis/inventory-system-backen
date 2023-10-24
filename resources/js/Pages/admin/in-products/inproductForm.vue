<template>
  <div>

    <adminLayeout>
        <form class="in-product-form grid grid-cols-1" action="">
      <label class="text-sm font-extrabold" for="Product Name"
        >Product Name</label
      >
      <input
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="product name"
      />
      <label class="text-sm font-extrabold" for="Serial Number"
        >Serial Number</label
      >
      <input
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="serial number"
      />
      <label class="text-sm font-extrabold" for="Quantity">Quantity</label>
      <input
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="quantity"
      />
      <label class="text-sm font-extrabold" for="Product Name"
        >Product description</label
      >
      <input
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="description"
      />

      <button class="btn-component text-sm text-bold">submit</button>
    </form>

    </adminLayeout>
  </div>
  </template>


  <script setup>
  import adminLayeout from "../../../Layouts/admin/adminLayeout.vue"

</script>
  <style></style>
