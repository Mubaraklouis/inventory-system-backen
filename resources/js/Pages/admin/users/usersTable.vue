<template>
   <div class="relative mr-16 overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the product -->
        <table class="w-full text-xs text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
              <th scope="col" class="px-3 py-4">Name</th>
              <th scope="col" class="px-3 py-4">Email</th>
              <th scope="col" class="px-3 py-4">Roll</th>
              <th v-if="User.is_admin" scope="col" class="px-3 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users.data" :key="user.id" class="bg-white border-b">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <Link>{{ user.name }}</Link>
              </th>
              <td class="px-6 py-4">{{ user.email }}</td>
              <td class="px-6 py-4">{{ checkRoll(user.is_admin,user.is_seller) }}</td>
              <td v-if="User.is_admin" class="px-6 py-4">
                <div class="flex gap-4">
                  <div class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                    <Link @click="deleteUser(user.id)" as="button" ><img class="w-4 h-4" src="/icons/trash.png" alt /></Link>
                  </div>
                  <div class="p-2 font-medium text-white rounded-md hover:underline table-primary">
                    <Link :href="
                      route(
                        'user.edit',
                        user.id
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
</template>

<script setup>
import { Link,useForm,usePage } from '@inertiajs/vue3';
import { defineProps,ref,computed  } from 'vue';

const page =usePage()
const User = computed(()=>page.props.auth.user);
const roll = ref('Seller');
const checkRoll =(admin,seller)=>{
    if(admin){
        return "Admin"
    }
    else if(seller){
        return "seller"
    }
    else{
        return "Regular account"
    }
};

defineProps({
    users:Array
})

const form =useForm({
    id:null
})

const deleteUser = (id) => {
    if (confirm("are sure you want to delete the user")) {
        form.delete(route('users.delete', id))
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
