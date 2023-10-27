<template>
  <div>

    <adminLayeout>
        <form @submit.prevent="submitForm()" class="in-product-form grid grid-cols-1" action="">
      <label class="text-sm font-extrabold" for="Product Name"
        >Product Name</label
      >
      <input
      v-model="form.name"
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="product name"
      />
      <label class="text-sm font-extrabold" for="Serial Number"
        >Serial Number</label
      >
      <input
       v-model="form.serial_number"
        class="text-xs p-1 text-gray-500"
        type="number"
        placeholder="serial number"
      />
      <label class="text-sm font-extrabold" for="Quantity">Quantity</label>
      <input
      v-model="form.quantity"
        class="text-xs p-1 text-gray-500"
        type="number"
        placeholder="quantity"
      />
      <label class="text-sm font-extrabold" for="Quantity">price</label>
      <input
      v-model="form.price"
        class="text-xs p-1 text-gray-500"
        type="number"
        placeholder="price"
      />
      <label class="text-sm font-extrabold" for="Product Name"
        >Product description</label
      >
      <input
      v-model="form.description"
        class="text-xs p-1 text-gray-500"
        type="text"
        placeholder="description"
      />

      <button type="submit" class="btn-component text-sm text-bold">submit</button>
    </form>
    </adminLayeout>
  </div>
  </template>


  <script setup>
  import adminLayeout from "../../../Layouts/admin/adminLayeout.vue"
  import { useForm } from '@inertiajs/vue3'
  import { usePage } from "@inertiajs/vue3";
  import { computed } from 'vue'


  const page = usePage();

  const user = computed(() => page.props.auth.user);

  const form = useForm({
    user_id:user.value.id,
    name:"",
    price:"",
    serial_number:"",
    description:"",
    quantity:"",
    sold:0
  })


  const submitForm =()=>{
    form.post(route('product.store'));
  }

</script>
  <style></style>
