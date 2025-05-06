<script setup>
import NavLink from "./nav-link.vue";
import { useAttrs } from "@vue/runtime-core";
import { ref } from "vue";

const isActive = ref(true);
const hasError = ref(false);
const text = ref("text-blue-500");
const button = ref("border border-gray-300 text-white");
</script>

<template>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img
                                alt="My Company"
                                class="size-8"
                                src="https://laracasts.com/images/logo/logo-triangle.svg"
                            />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a :class="text" href="/">Test</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <NavLink :active="{request()->is('/')" href="/"
                                >Moobo
                            </NavLink>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<style scoped></style>
