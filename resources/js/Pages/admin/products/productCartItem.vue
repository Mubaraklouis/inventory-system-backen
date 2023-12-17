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

    function  sell()
    {
        //send a post request to the server with the sold products
        sellForm.post(route('products.sell'),)
    }
</script>

<template>
    <div class="products mb-5 bt-5">
        <div class="product">
            <div class="image-wrapper rounded-lg border">
                <img class="  rounded-t-lg" src="/images/apple-watch.png" alt="product image" />
            </div>
            <div>
                <h3 class="font-bold mb-1">{{product.name}}</h3>
                <p class="text-gray-500 text-xs font-extrabold">{{product.serial_number}}</p>
            </div>
        </div>
        <div class="flex gap-5">
            <div class="increment-btn flex gap-5   border-2 p-2  rounded-lg ">
                <p class=" text-xs font-extrabold">
                    Add
                </p>
                <p class="text-xs font-extrabold">1</p>

                <p class="text-xs font-extrabold ">Remove</p>
            </div>

            <div class="flex gap-2 p-2">
                <h3 class="font-extrabold text-xs">${{product.price}}</h3>
                <Link @click="removeCartItem(product.id)">  <img class="w-4 h-4" src="/icons/delete.png" alt /></Link>
            </div>
        </div>

    </div>
</template>
