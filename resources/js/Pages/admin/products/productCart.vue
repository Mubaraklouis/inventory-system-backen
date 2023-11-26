

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    show:Boolean
})
</script>

<template>
        <div v-if="show" class="model-mask">
       <div class="model-card">
        <div class="border-b-2 pl-5 pb-2 flex justify-between" >
          <h1 class="font-extrabold">Cart</h1>

            <button  class="bg-black text-white rounded-md p-2 text-xs " @click="$emit('close')">CANCEL</button>

        </div>
           <div>
        <div class="products mb-5 bt-5">
          <div class="product">
            <div class="image-wrapper rounded-lg border">
              <img class="  rounded-t-lg" src="/images/apple-watch.png" alt="product image" />
            </div>
            <div>
              <h3 class="font-bold mb-1">product name</h3>
              <p class="text-gray-500 text-xs font-extrabold">204854</p>
            </div>
          </div>
          <div class="flex gap-5">
    <div class="increment-btn flex gap-5   border-2 p-2  rounded-lg ">
   <p class=" text-xs font-extrabold">
     Add
   </p>
      <p class="text-xs font-extrabold">1</p>

    <p class="text-xs font-extrabold ">Remove</p>
    </div>

            <div class="flex gap-2 p-2">
              <h3 class="font-extrabold text-xs">$2948</h3>
              <img class="w-4 h-4" src="/icons/delete.png" alt />
            </div>
          </div>

        </div>

           </div>

         <div>
           <div class="products mb-5 bt-5">
             <div class="product">
               <div class="image-wrapper rounded-lg border">
                 <img class="  rounded-t-lg" src="/images/apple-watch.png" alt="product image" />
               </div>
               <div>
                 <h3 class="font-bold mb-1">product name</h3>
                 <p class="text-gray-500 text-xs font-extrabold">204854</p>
               </div>
             </div>
             <div class="flex gap-5">
               <div class="increment-btn flex gap-5   border-2 p-2  rounded-lg ">
                 <p class=" text-xs font-extrabold">
                   Add
                 </p>
                 <p class="text-xs font-extrabold">1</p>

                 <p class="text-xs font-extrabold ">Remove</p>
               </div>

               <div class="flex gap-2 p-2">
                 <h3 class="font-extrabold text-xs">$2948</h3>
                 <img class="w-4 h-4" src="/icons/delete.png" alt />
               </div>
             </div>

           </div>

         </div>

         <div class="flex justify-center bg-blue-700 text-white rounded-md ">
           <button>Purcase</button>
         </div>

       </div>
        </div>

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

