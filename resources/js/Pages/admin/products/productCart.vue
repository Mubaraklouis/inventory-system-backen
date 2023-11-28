

<script setup>
import {Link} from "@inertiajs/vue3";
import ProductCartItem from "@/Pages/admin/products/productCartItem.vue";
import {computed} from "vue";

const props =defineProps({
    show:Boolean,
    products:Array

})

const cartProducts = props.products.filter((product)=>product.added_cart === 1)
const prices = cartProducts.map((product)=>product.price)


const totalPrice = computed(()=>{
    let price =0;
    for(let i =0; i<prices.length; i++){
        price+=prices[i]
    }

    return price;

})


</script>

<template>
  <transition
enter-from-class="opacity-0 scale-125"
enter-to-class="opacity-100 scale-100"
enter-active-class="transition duration-300"
leave-active-class="transition duration-200"
leave-from-class="opacity-100 scale-100"
leave-to-class="opacity-0 scale-125"
  >
      <div v-if="show" class="model-mask">
          <div class="model-card">
              <div class="border-b-2 pl-5 pb-2 flex justify-between" >
                  <h1 class="font-extrabold">Cart</h1>

                  <button  class="bg-black text-white rounded-md p-2 text-xs " @click="$emit('close')">CANCEL</button>

              </div>
             <!-- product carts are loaded here-->
              <ProductCartItem v-for="product in cartProducts" key="product.id" :product="product"/>

              <div class="flex justify-between border-t-2 mt-4 pt-4">
                <div class="flex gap-x-1.5">
                    <button class="bg-blue-700 text-white rounded-md p-1 ml-5 font-extrabold text-xs p-2">Purcase</button>
                    <button class="bg-black text-white rounded-md p-1 ml-5 font-extrabold text-xs ">Print Invoice</button>
                </div>

                  <h1 class="font-extrabold text-xs">Total price: ${{totalPrice}}</h1>
              </div>

          </div>
      </div>

  </transition>
</template>

<style>
.model-mask{
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0,0,0,.6);
    width: 100%;
    height: 100vh;
    display: grid;
    place-items: center;

}

.model-card{
    background: #ffffff;
    padding: 2rem;
    width: 60%;
  border: 1px solid darkgray;
  border-radius: 10px;
  box-shadow:5px 5px 5px 2px rgba(0,0,0,.1);

}
.products{
  display: flex;
  justify-content:space-between;
  margin: 1rem;
}
.product{
  display: flex;
  gap: 10px;

}
.product img{
  width: 60px;
  padding: 5px;
}
.image-wrapper{
  background: lightgrey;
  height: 50px;
}
.increment-btn{
  height: 30px;
  margin-top: 4px;
}
</style>

