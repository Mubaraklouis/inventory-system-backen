<script setup>

import {useForm,Link} from "@inertiajs/vue3";

defineProps({
    product:Object
})

const form = useForm({
    id:null
});

const sellForm = useForm({
    sold:null
});

    function  removeCartItem(id)
    {
        //make request to the server with the id and remove it from the cart
        form.put(route('products.removeCart',id));
    }

</script>

<template>
    <div class="mb-5 products bt-5">
        <div class="product">
            <div class="border rounded-lg image-wrapper">
                <img class="rounded-t-lg " src="/images/apple-watch.png" alt="product image" />
            </div>
            <div>
                <h3 class="mb-1 font-bold">{{product.name}}</h3>
                <p class="text-xs font-extrabold text-gray-500">{{product.serial_number}}</p>
            </div>
        </div>
        <div class="flex gap-5">
            <div class="flex gap-5 p-2 border-2 rounded-lg increment-btn ">
                <p class="text-xs font-extrabold ">
                    Add
                </p>
                <p class="text-xs font-extrabold">1</p>

                <p class="text-xs font-extrabold ">Remove</p>
            </div>

            <div class="flex gap-2 p-2">
                <h3 class="text-xs font-extrabold">${{product.price}}</h3>
                <Link @click="removeCartItem(product.id)">  <img class="w-4 h-4" src="/icons/delete.png" alt /></Link>
            </div>
        </div>

    </div>
</template>
