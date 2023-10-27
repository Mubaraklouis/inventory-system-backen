<script setup>
import { Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

import DropdownLink from "@/Components/DropdownLink.vue";


//this is the intertia function that allows the access of shared data
const page = usePage();

//created a computed property to get user info
const user = computed(() => page.props.auth.user);
</script>

<template>
    <div>
        <section class="grid grid-cols-5 h-full">
            <nav class="w-full nav-border nav-border">
                <!-- creating the logo div -->
                <div class="grid grid-cols-2 gap-2 w-10">
                    <div>
                        <img
                            class="w-6 h-6"
                            src="/icons/delivery-cart.png"
                            alt=""
                        />
                    </div>
                    <div>
                        <h5 class="title-one">system</h5>
                    </div>
                </div>
                <section>
                    <div class="mt-16">
                        <ul
                            class="text-bold font-extrabold text-xs flex flex-col gap-5"
                        >
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/home.png"
                                        alt=""
                                    />
                                </div>
                           <Link href="/dashboard">Dashboard</Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/delivery-cart.png"
                                        alt=""
                                    />
                                </div>

                                <Link href="/product/add-product"> In products </Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/box-open.png"
                                        alt=""
                                    />
                                </div>
                                <Link href="/product/index"> Out products </Link>
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/file-medical-alt.png"
                                        alt=""
                                    />
                                </div>
                                Reports
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/calendar-lines.png"
                                        alt=""
                                    />
                                </div>
                                Calender
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/user.png"
                                        alt=""
                                    />
                                </div>
                                Users
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/envelope.png"
                                        alt=""
                                    />
                                </div>
                                Messages
                            </li>
                            <li class="flex gap-y-6 gap-x-2 items-center">
                                <div>
                                    <img
                                        class="w-4 h-4"
                                        src="/icons/settings.png"
                                        alt=""
                                    />
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
                        <img
                            class="w-12 h-12 user-border rounded-full"
                            src="/images/profile.jpg"
                            alt=""
                        />
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
                    <ul class="text-bold font-extrabold text-sm flex gap-4">
                        <li>
                            Dashboard
                            <div class="indicator-bar"></div>
                        </li>
                        <li class="secondary-text">In products</li>
                        <li class="secondary-text">outproduct</li>
                        <li class="secondary-text">Reports</li>
                    </ul>
                </div>

                <!-- forms inputs
       search->it is the seach
       calender dropdown -->
                <div class="filters-inputs m-8 flex gap-x-8 pl-12">
                    <div
                        class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4"
                    >
                        <div class="col-span-2 flex gap-2">
                            <img
                                class="w-6 h-6"
                                src="/icons/calendar-lines-pen.png"
                                alt=""
                            />
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
                            <img
                                class="w-4 h-4"
                                src="/icons/angle-small-down.png"
                                alt=""
                            />
                        </div>
                    </div>
                    <!-- workinf on the category -->
                    <div
                        class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4"
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

                        <div>
                            <img
                                class="w-4 h-4"
                                src="/icons/angle-small-down.png"
                                alt=""
                            />
                        </div>
                    </div>

                    <!-- code for the search button -->

                    <input
                        class="calender-input grid grid-cols-3 gap-2 justify-center items-center pl-4 text-xs"
                        placeholder="search  CTR+K"
                    />
                </div>

                <div class="grid grid-cols-1 justify-center pl-20">
                    <!-- this where all the components are going to be loaded -->
                    <slot />
                </div>
            </div>
        </section>
    </div>
</template>

<style></style>
