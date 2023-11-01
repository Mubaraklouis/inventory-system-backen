
<template>
    <div>
        <adminLayeoutVue>
            <productCategoryTable :products="products" :category="category"/>
            <pagePagination :Links="products.links"></pagePagination>
        </adminLayeoutVue>

    </div>
</template>

<script  setup>

import { defineProps } from 'vue';
import adminLayeoutVue from '@/Layouts/admin/adminLayeout.vue';
import pagePagination from '../partial/pagePagination.vue';
import productCategoryTable from "@/Components/category/productCategoryTable.vue"



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
