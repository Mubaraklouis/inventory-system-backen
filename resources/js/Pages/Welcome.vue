<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    products: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <div>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div
                class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto"
            >
                <Link class="flex items-center">
                    <img
                        src="icons/delivery-cart.png"
                        class="h-8 mr-3"
                        alt="Flowbite Logo"
                    />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        >Inventory</span
                    >
                </Link>
                <div class="flex items-center">
                    <Link
                        href="register"
                        class="mr-6 text-sm text-gray-500 dark:text-white hover:underline"
                        >Register</Link
                    >
                    <Link
                        href="/login"
                        class="text-sm text-blue-600 dark:text-blue-500 hover:underline"
                        >Login</Link
                    >
                </div>
            </div>
        </nav>

        <section class="bg-white dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16">
                <h1
                    class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
                >
                    We invest in the world’s potential
                </h1>
                <p
                    class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"
                >
                    Here at inventory systems we focus on markets where
                    technology, innovation, and capital can unlock long-term
                    value and drive economic growth.
                </p>
                <div
                    class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
                >
                    <a
                        href="#"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
                    >
                        Get started
                        <svg
                            class="w-3.5 h-3.5 ml-2"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9"
                            />
                        </svg>
                    </a>
                    <a
                        href="#"
                        class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                    >
                        Learn more
                    </a>
                </div>
            </div>
        </section>

        <footer class="bg-white shadow dark:bg-gray-900">
            <div class="w-full max-w-screen-xl p-4 mx-auto md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a
                        href="https://flowbite.com/"
                        class="flex items-center mb-4 sm:mb-0"
                    >
                        <img
                            src="icons/delivery-cart.png"
                            class="h-8 mr-3"
                            alt="Flowbite Logo"
                        />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                            >In-system</span
                        >
                    </a>
                    <ul
                        class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400"
                    >
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6"
                                >About</a
                            >
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6"
                                >Privacy Policy</a
                            >
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6"
                                >Licensing</a
                            >
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr
                    class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
                />
                <span
                    class="block text-sm text-gray-500 sm:text-center dark:text-gray-400"
                    >© 2023 <a class="hover:underline">Inventory-systems</a>.
                    All Rights Reserved.</span
                >
            </div>
        </footer>
    </div>
</template>

