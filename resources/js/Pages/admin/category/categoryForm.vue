<script setup>
import adminLayeout from '@/Layouts/admin/adminLayeout.vue'
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    title:""
})

const submitForm = () => {
    form.post(route('category.store'))
}


</script>

<template>
    <div>
  <adminLayeout>

      <form @submit.prevent="submitForm()" class="in-product-form grid grid-cols-1 mb-5" action="">
                <label class="text-sm font-extrabold" for="Product Name">Category Name</label>
                <input v-model="form.title" class="text-xs p-1 text-gray-500" type="text" placeholder="add category" />

                <button type="submit" class="btn-component text-sm text-bold">
                    submit
                </button>
            </form>
  </adminLayeout>
    </div>
</template>
