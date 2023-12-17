<script setup>
import { Link, usePage ,useForm} from "@inertiajs/vue3";
import { computed } from "vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from '@/Components/Dropdown.vue';



//this is the inertia function that allows the access of shared data
const page = usePage();

//created a computed property to get user info
const user = computed(() => page.props.auth.user);
//querying all the products
const products = computed(() => page.props.products_data)

// getting the search results here
const form = useForm({
   search:''
});

//this function is responsible for search for data in the database
const searchProduct =()=>{
    form.get(route('products.index'))
}

//when the cart button is click i want to send a custom event
// function sendEvent(){
//   defineEmits({
//     add,
//     data:true
//
//   })


// }

</script>

<template>
    <div>
        <section class="grid h-full grid-cols-5">
            <nav class="w-full nav-border">
                <!-- creating the logo div -->
                <div class="grid w-10 grid-cols-2 gap-2">
                    <div>
                        <img class="w-6 h-6" src="/icons/delivery-cart.png" alt="" />
                    </div>
                    <div>
                        <h5 class="title-one">system</h5>
                    </div>
                </div>
                <section>
                    <div class="mt-28">
                        <ul class="flex flex-col gap-5 text-xs font-extrabold text-bold">
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/home.png" alt="" />
                                </div>
                                <Link href="/dashboard">Dashboard</Link>
                            </li>

                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/shopping-cart-add (1).png" alt="" />
                                </div>
                                <button  @click="$emit('add')" >Cart</button>
                            </li>
                            <li v-if="user.is_admin" class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/delivery-cart.png" alt="" />
                                </div>

                                <Link href="/product/add-product"> In products </Link>
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/box-open.png" alt="" />
                                </div>
                                <Link href="/product/index"> All products </Link>
                            </li>
                               <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/object-group.png" alt="" />
                                </div>
                            <Link :href="route('category.index')">categories </Link>
                            </li>
                               <li v-if="user.is_admin" class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/pen-clip.png" alt="" />
                                </div>
                            <Link :href="route('category.create')">create category </Link>
                            </li>
                             <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/user.png" alt="" />
                                </div>
                             <Link :href="route('users.index')">users </Link>
                            </li>
                            <li v-if="user.is_admin" class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/add-user.png" alt="" />
                                </div>
                             <Link :href="route('users.create')"> Add users </Link>
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/file-medical-alt.png" alt="" />
                                </div>
                                Reports
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/calendar-lines.png" alt="" />
                                </div>
                                Calender
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/envelope.png" alt="" />
                                </div>
                                Messages
                            </li>
                            <li class="flex items-center gap-y-6 gap-x-2">
                                <div>
                                    <img class="w-4 h-4" src="/icons/settings.png" alt="" />
                                </div>
                                settings
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- creating the user section and the icon -->
                <div class="pt-2 pb-2 mt-48">
                    <!-- this div contains the user avatar -->

                    <div class="flex gap-2 align-center rounded-border">
                        <img class="w-12 h-12 rounded-full user-border" src="/images/profile.jpg" alt="" />
                        <div>

                            <h5 class="mt-2 text-sm font-extrabold">
                                <Link href="/profile">{{ user.name }}</Link>
                            </h5>
                            <h5 class="text-xs secondary-text">
                                <Link href="/logout" as="button" method="post">Logout</Link>
                            </h5>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- main page markup -->
            <div class="col-span-4">
                <!-- the h4 is for the main title -->
                <div>
                    <h4 class="pt-6 pl-20 font-extrabold uppercase text-md">
                        In products
                    </h4>
                </div>
                <!-- here is the mini navbar for reports,in products etc.. -->
                <div class="w-full pl-20 mt-10 mini-nav-border">
                    <ul class="flex gap-4 text-sm font-extrabold middle-menu text-bold">
                        <li class="cursor-pointer">
                            <Link href="/dashboard">Dashboard</Link>
                            <div class="indicator-bar-dashboard"></div>
                        </li>
                        <li v-if="user.is_admin" class="cursor-pointer secondary-text">
                            <Link :href="route('product.create')">In products</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="cursor-pointer secondary-text">
                            <Link :href="route('product.unsold')">unsold products</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="cursor-pointer secondary-text">
                            <Link :href="route('product.sold')">sold products</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="cursor-pointer secondary-text">
                            <Link :href="route('products.index')">All products</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="cursor-pointer secondary-text">
                            <Link href="#">Reports</Link>
                            <div class="indicator-bar"></div>
                        </li>
                    </ul>
                </div>

                <!-- forms inputs
       search->it is the search
       calender dropdown -->
                <div class="flex pl-12 m-8 filters-inputs gap-x-8">
                    <div class="grid items-center justify-center grid-cols-3 gap-2 pl-4 calender-input">
                        <div class="flex col-span-2 gap-2">
                            <img class="w-6 h-6" src="/icons/calendar-lines-pen.png" alt="" />
                            <div>
                                <p class="text-xs font-bold text-gray-500">
                                    Date
                                </p>
                                <h4 class="text-xs font-extrabold">
                                    Last Year
                                </h4>
                            </div>
                        </div>

                        <div>
                            <img class="w-4 h-4" src="/icons/angle-small-down.png" alt="" />
                        </div>
                    </div>
                    <!-- working on the category -->

                    <div class="grid items-center justify-center grid-cols-3 gap-2 pl-4 cursor-pointer calender-input">
                        <!-- Settings Dropdown -->
                        <div class="relative ml-1">
                            <Dropdown align="center" width="48">
                                <br>
                                <template #trigger>
                                    <span class="inline-flex rounded-md ">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            categories

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>
                                <br>

                                <template #content>
                                    <DropdownLink v-for="category in products" :key="category.id"
                                        :href="route('category.show', category.id)">{{ category.title }}</DropdownLink>

                                </template>
                            </Dropdown>
                        </div>
                    </div>


                    <!-- {{ products }} -->

                    <!-- code for the search button -->
                  <form @submit.prevent="searchProduct()"  method="GET">
                    <input v-model="form.search" name="search" class="grid items-center justify-center grid-cols-3 gap-2 pl-4 text-xs calender-input"
                        placeholder="search  CTR+K" />
                  </form>
                </div>

                <div class="grid justify-center grid-cols-1 pl-20">
                    <!-- this where all the components are going to be loaded -->
                    <slot />
                </div>
            </div>
        </section>
    </div>
</template>


