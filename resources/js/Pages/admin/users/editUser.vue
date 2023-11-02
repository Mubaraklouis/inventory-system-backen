<script setup>


import { Head, Link, useForm } from '@inertiajs/vue3';
import adminLayeout from '@/Layouts/admin/adminLayeout.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { defineProps } from 'vue';


const props =defineProps({
    user:Object
})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: props.user.password,
    password_confirmation: props.user.password_confirmation,
});

const submit = () => {
    form.put(route('user.update',props.user.id), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    
     
      <adminLayeout>
        <h1 class="mt-4 mb-4 font-sans font-extrabold uppercase text-md">Create a user</h1>
        <form @submit.prevent="submit()" class="grid grid-cols-1 mb-5 in-product-form" action="">
                <label class="text-sm font-extrabold" for="Product Name">Name</label>
                <input v-model="form.name" class="p-1 text-xs text-gray-500" type="text" placeholder="name" />
                <label class="text-sm font-extrabold" for="Serial Number">Email</label>
                <input v-model="form.email" class="p-1 text-xs text-gray-500" type="email"
                    placeholder="email" />
          
                <label class="text-sm font-extrabold" for="Quantity">Password</label>
                <input v-model="form.password" class="p-1 text-xs text-gray-500" type="password" placeholder="password" />
                <label class="text-sm font-extrabold" for="Quantity">confirm password</label>
                <input v-model="form.password_confirmation" class="p-1 text-xs text-gray-500" type="password" placeholder="confirm password" />


                <button type="submit" class="text-sm btn-component text-bold">
                    submit
                </button>
            </form>
        
      </adminLayeout>
 
</template>
