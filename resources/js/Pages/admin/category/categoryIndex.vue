<template>
    <div>
        <adminLayeout>
<div class="relative mr-16 w- overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the product -->
        <table class="w-full text-xs text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
              <th scope="col" class="px-3 py-4">category name</th>
              <th scope="col" class="px-3 py-4"></th>
              <th scope="col" class="px-3 py-4"></th>
              <th v-if="user.is_admin" scope="col" class="px-3 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="category in categories" :key="category.id" class="bg-white border-b">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
              {{ category.title }}
              </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

              </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

              </th>

              <td v-if="user.is_admin" class="px-6 py-4">
                <div class="flex gap-4">
                  <div  class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                    <Link @click="deleteProduct(category.id)" as="button" ><img class="w-4 h-4" src="/icons/trash.png" alt /></Link>
                  </div>
                  <div class="p-2 font-medium text-white rounded-md hover:underline table-primary">
                     <Link :href="
                      route(
                        'category.edit',
                         category.id
                      )
                    ">
                    <img class="w-4 h-4" src="/icons/file-edit.png" alt />
                    </Link>
                  </div>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>


        </adminLayeout>
    </div>
</template>
<script setup>
import adminLayeout from '@/Layouts/admin/adminLayeout.vue';
import { defineProps,computed } from 'vue';
import { Link,useForm ,usePage} from '@inertiajs/vue3';


const page = usePage();

const user = computed(()=>page.props.auth.user);

defineProps({
    categories:Array

})


const form = useForm({
    id: null,
});

const deleteProduct = (id) => {
    if (confirm("are sure you want to delete the product")) {
        form.delete(route('category.delete', id))
    }
}

</script>
<style>
.table-secondary {
    background-color: #cecbf7;
}

.table-primary {
    background-color: #b086f3;
}
</style>
