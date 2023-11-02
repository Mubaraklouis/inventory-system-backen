<script setup>
import { Link , useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { computed } from 'vue';

defineProps({
    category: Object,
    products: Array
});

const user = computed(() => page.props.auth.user);

const form = useForm({
    id: null,
});


const sellForm = useForm({
    id: null,
});

const deleteProduct = (id) => {
    if (confirm("are sure you want to delete the product")) {
        form.delete(route('product.delete', id))
    }
}
const productAvailabilty = (status) => {
    if (status == 1) {
    return "sold"
    }
    else {
    return "unsold"
}
}



const sell = ( id) => {
    //make a put request with the product id
    sellForm.put(route('product.sell',id))

}

</script>
<template>
    <div class="relative mr-16 overflow-x-auto shadow-md sm:rounded-lg">
        <!-- this is the product -->
        <table class="w-full text-xs text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-100 table-secondary">
            <tr>
              <th scope="col" class="px-3 py-4">Product name</th>
              <th scope="col" class="px-3 py-4">QTY</th>
              <th scope="col" class="px-3 py-4">Category</th>
              <th scope="col" class="px-3 py-4">Price</th>
              <th scope="col" class="px-3 py-4">serial no</th>
              <th scope="col" class="px-3 py-4">status</th>
              <th scope="col" class="px-3 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products.data" :key="product.id" class="bg-white border-b">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                <Link :href="route('product.show', product.id)">{{ product.name }}</Link>
              </th>
              <td class="px-6 py-4">{{ product.quantity }}</td>
              <td class="px-6 py-4">{{ product.category.title }}</td>
              <td class="px-6 py-4">${{ product.price }}</td>
              <td class="px-6 py-4">
                {{ product.serial_number }}
              </td>
               <td class="px-6 py-4">
                {{ productAvailabilty(product.sold)}}
              </td>
              <td class="px-6 py-4">
                <div class="flex gap-4">
                  <div class="p-2 font-medium text-white bg-red-400 rounded-md hover:underline">
                    <Link @click="deleteProduct(product.id)" as="button" ><img class="w-4 h-4" src="/icons/trash.png" alt /></Link>
                  </div>
                  <div class="p-2 font-medium text-white rounded-md hover:underline table-primary">
                    <Link :href="
                      route(
                        'product.edit',
                        product.id
                      )
                    ">
                    <img class="w-4 h-4" src="/icons/file-edit.png" alt />
                    </Link>
                  </div>
                   <div class="p-2 font-medium text-white bg-blue-500 rounded-md hover:underline">
                    <Link @click="sell(product.id)" as="button">
                    <img class="w-4 h-4" src="/icons/selling.png" alt />
                    </Link>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
</template>
<style scoped>
.table-secondary {
    background-color: #cecbf7;
}

.table-primary {
    background-color: #b086f3;
}
</style>
