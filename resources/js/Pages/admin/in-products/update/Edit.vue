<script setup>
import adminLayeout from "../../../../Layouts/admin/adminLayeout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, defineProps } from "vue";

const prop = defineProps({
    product: Array,
});

const page = usePage();

const user = computed(() => page.props.auth.user);

const form = useForm({
    user_id: user.value.id,
    name: prop.product.name,
    price: prop.product.product,
    serial_number: prop.product.serial_number,
    description: prop.product.description,
    quantity: prop.product.quantity,
    sold: 0,
});

const submitForm = () => {
    form.post(route("product.store"));
};
</script>

<template>
    <div>
        <adminLayeout>
            <form
                @submit.prevent="submitForm()"
                class="grid grid-cols-1 mb-5 in-product-form"
                action=""
            >
                <label class="text-sm font-extrabold" for="Product Name"
                    >Product Name</label
                >
                <input
                    v-model="form.name"
                    class="p-1 text-xs text-gray-500"
                    type="text"
                    placeholder="product name"
                />
                <label class="text-sm font-extrabold" for="Serial Number"
                    >Serial Number</label
                >
                <input
                    v-model="form.serial_number"
                    class="p-1 text-xs text-gray-500"
                    type="number"
                    placeholder="serial number"
                />
                <label class="text-sm font-extrabold" for="Quantity"
                    >Quantity</label
                >
                <input
                    v-model="form.quantity"
                    class="p-1 text-xs text-gray-500"
                    type="number"
                    placeholder="quantity"
                />
                <label class="text-sm font-extrabold" for="Quantity"
                    >price</label
                >
                <input
                    v-model="form.price"
                    class="p-1 text-xs text-gray-500"
                    type="number"
                    placeholder="price"
                />
                <label class="text-sm font-extrabold" for="Product Name"
                    >Product description</label
                >
                <input
                    v-model="form.description"
                    class="p-1 text-xs text-gray-500"
                    type="text"
                    placeholder="description"
                />

                <button type="submit" class="text-sm btn-component text-bold">
                    submit
                </button>
            </form>
        </adminLayeout>
    </div>
</template>

