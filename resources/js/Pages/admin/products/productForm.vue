<template>
    <div>
        <adminLayeout>
            <form @submit.prevent="submitForm()" class="grid grid-cols-1 mb-5 in-product-form" action="">
                <label class="text-sm font-extrabold" for="Product Name">Product Name</label>
                <InputError :message="form.errors.name"/>
                <input v-model="form.name" class="p-1 text-xs text-gray-500" type="text" placeholder="product name" />
                <label class="text-sm font-extrabold" for="Serial Number">Serial Number</label>
                <InputError :message="form.errors.serial_number"/>
                <input v-model="form.serial_number" class="p-1 text-xs text-gray-500" type="number"
                    placeholder="serial number" />
                <label class="text-sm font-extrabold" for="Serial Number">category</label>


                <select  v-model="form.category_id" name="category_id" id="countries"   class="p-1 text-xs text-gray-500 bg-blue-100 rounded-lg">
            <option :value="category.id" v-for="category in categories" :key="category.id" selected>{{ category.title }}</option>
        </select>
        <InputError :message="form.errors.quantity"/>
                <label class="text-sm font-extrabold" for="Quantity">Quantity</label>

                <input v-model="form.quantity" class="p-1 text-xs text-gray-500" type="number" placeholder="quantity" />
                <InputError :message="form.errors.price"/>
                <label class="text-sm font-extrabold" for="Quantity">price</label>
                <input v-model="form.price" class="p-1 text-xs text-gray-500" type="number" placeholder="price" />

                <label class="text-sm font-extrabold" for="Product Name">Product description</label>
                <InputError :message="form.errors.description"/>
                <input v-model="form.description" class="p-1 text-xs text-gray-500" type="text" placeholder="description" />

                <button type="submit" class="text-sm btn-component text-bold">
                    submit
                </button>
            </form>
        </adminLayeout>



    </div>
</template>

<script setup>
import adminLayeout from "../../../Layouts/admin/adminLayeout.vue";
import { useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
import { defineProps } from "vue";
import InputError from "@/Components/InputError.vue"


defineProps({
    categories: Array
})

const page = usePage();

const user = computed(() => page.props.auth.user);

const form = useForm({
    user_id: user.value.id,
    category_id: null,
    name: "",
    price: "",
    serial_number: "",
    description: "",
    quantity: "",
    sold: 0,
});



const submitForm = () => {
    form.post(route("product.store"));
};
</script>
<style></style>
