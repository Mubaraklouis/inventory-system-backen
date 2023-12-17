
<template>
    <div>
        <adminLayeoutVue>
            <productCategoryTable :is_seller="user.is_seller" :is_admin="user.is_admin" :products="products" :category="category"/>
            <pagePagination :Links="products.links"></pagePagination>
        </adminLayeoutVue>

    </div>
</template>

<script  setup>

import { defineProps,computed } from 'vue';
import adminLayeoutVue from '@/Layouts/admin/adminLayeout.vue';
import pagePagination from '../partial/pagePagination.vue';
import productCategoryTable from "@/Components/category/productCategoryTable.vue"
import { usePage } from '@inertiajs/vue3';


//implement the shopping cart

const addProduct=()=>{
    
}

const page = usePage();
const user = computed(()=>page.props.auth.user);

defineProps({
    category: Object,
    products: Array
});


</script>

<style scoped>
.table-secondary {
    background-color: #cecbf7;
}

.table-primary {
    background-color: #b086f3;
}
</style>
