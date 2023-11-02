<template>
    <div>
        <adminLayeoutVue>

            <usersTable :users="users"/>

            <pagePaginationVue :Links="users.links"/>

        </adminLayeoutVue>

    </div>
</template>

<script setup>
import adminLayeoutVue from '@/Layouts/admin/adminLayeout.vue';
import usersTable from './usersTable.vue';
import pagePaginationVue from '../partial/pagePagination.vue';

import { defineProps } from 'vue';

defineProps({
    users:Array
});
</script>
