<script setup>
import adminLayeout from "../../../../Layouts/admin/adminLayeout.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, defineProps } from "vue";

const prop = defineProps({
    product: Object,
    categories:Array
});

const page = usePage();

const user = computed(() => page.props.auth.user);

const form = useForm({
    user_id: user.value.id,
    category_id:prop.product.category_id,
    name: prop.product.name,
    price: prop.product.price,
    serial_number: prop.product.serial_number,
    description: prop.product.description,
    quantity: prop.product.quantity,
    sold: 0,
});

const submitForm = () => {
    form.put(route("product.update",prop.product.id));
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
                <label class="text-sm font-extrabold" for="Product Name"
                    >Product Name</label
                >

                <select v-model="form.category_id" name="category_id" id="countries"   class="text-xs p-1 text-gray-500 rounded-lg bg-blue-100">
            <option :value="category.id" v-for="category in categories" :key="category.id"> {{ category.title }}</option>
        </select>
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

