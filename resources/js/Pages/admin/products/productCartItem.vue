<script setup>

defineProps({
    product:Object
})

</script>

<template>
    <div>
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
                    <img class="w-4 h-4" src="/icons/delete.png" alt />
                </div>
            </div>

        </div>

    </div>
</template>
