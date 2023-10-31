<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

import DropdownLink from "@/Components/DropdownLink.vue";
import Dropdown from '@/Components/Dropdown.vue';

import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';


//this is the intertia function that allows the access of shared data
const page = usePage();

//created a computed property to get user info
const user = computed(() => page.props.auth.user);
//querring all the products
const products = computed(() => page.props.products_data)


</script>

<template>
    <div>
        <section class="grid grid-cols-5 h-full">
            <nav class="w-full nav-border nav-border">
                <!-- creating the logo div -->
                <div class="grid grid-cols-2 gap-2 w-10">
                    <div>
                        <img class="w-6 h-6" src="/icons/delivery-cart.png" alt="" />
                    </div>
                    <div>
                        <h5 class="title-one">system</h5>
                    </div>
                </div>
                <section>
                    <div class="mt-16">
                        <ul class="text-bold font-extrabold text-xs flex flex-col gap-5">
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/home.png" alt="" />
                                </div>
                                <Link href="/dashboard">Dashboard</Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/delivery-cart.png" alt="" />
                                </div>

                                <Link href="/product/add-product"> In products </Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/box-open.png" alt="" />
                                </div>
                                <Link href="/product/index"> Out products </Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/file-medical-alt.png" alt="" />
                                </div>
                                Reports
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/calendar-lines.png" alt="" />
                                </div>
                                Calender
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/user.png" alt="" />
                                </div>
                                Users
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/envelope.png" alt="" />
                                </div>
                                Messages
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img class="w-4 h-4" src="/icons/settings.png" alt="" />
                                </div>
                                settings
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- creating the user section and the icon -->
                <div class="mt-32 pt-2 pb-2">
                    <!-- this div contains the user avater -->

                    <div class="flex gap-2 align-center rounded-border">
                        <img class="w-12 h-12 user-border rounded-full" src="/images/profile.jpg" alt="" />
                        <div>
                            <!-- <h5 class="text-sm font-extrabold mt-2">{{ user.name }}</h5> -->
                            <h5 class="text-sm font-extrabold mt-2">
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
                    <h4 class="pl-20 pt-6 text-md uppercase font-extrabold">
                        In products
                    </h4>
                </div>
                <!-- here is the mini navbar for reports,inproducts etc.. -->
                <div class="mt-10 mini-nav-border pl-20 w-full">
                    <ul class=" middle-menu text-bold font-extrabold text-sm flex gap-4">
                        <li class="cursor-pointer">
                            <Link href="/dashboard">Dashboard</Link>
                            <div class="indicator-bar-dashboard"></div>
                        </li>
                        <li class="secondary-text cursor-pointer">
                            <Link :href="route('product.create')">In products</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="secondary-text cursor-pointer">
                            <Link :href="route('products.index')">out product</Link>
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="secondary-text cursor-pointer">
                            <Link href="#">Reports</Link>
                            <div class="indicator-bar"></div>
                        </li>
                    </ul>
                </div>

                <!-- forms inputs
       search->it is the seach
       calender dropdown -->
                <div class="filters-inputs m-8 flex gap-x-8 pl-12">
                    <div class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4">
                        <div class="col-span-2 flex gap-2">
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
                    <!-- workinf on the category -->
                    <!-- <select
                        class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4 cursor-pointer"
                    >
                        <div class="col-span-2 flex gap-2">
                            <img
                                class="w-6 h-6"
                                src="/icons/object-group.png"
                                alt=""
                            />
                            <div>
                                <p class="text-xs font-bold text-gray-500">
                                    Category
                                </p>
                                <h4 class="text-xs font-extrabold">All</h4>
                            </div>
                        </div>
                        <br>
                        <option :value="category.id" v-for="category in products" :key="category.id" class="cursor-pointer mt-4"><Link :href="route('category.show',category.id)" >{{ category.title }}</Link></option>


                        <div>
                            <img
                                class="w-4 h-4"
                                src="/icons/angle-small-down.png"
                                alt=""
                            />
                        </div>
                    </select> -->

                    <div class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4 cursor-pointer">
                        <!-- Settings Dropdown -->
                        <div class="ml-1 relative">
                            <Dropdown align="center" width="48">
                                <br>
                                <template #trigger>
                                    <span class="inline-flex rounded-md ">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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


                    <input class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4 text-xs"
                        placeholder="search  CTR+K" />
                </div>

                <div class="grid grid-cols-1 justify-center pl-20">
                    <!-- this where all the components are going to be loaded -->
                    <slot />
                </div>
            </div>
        </section>
    </div>
</template>


