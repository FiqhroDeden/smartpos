<template>
    <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item" v-for="link in links">
            <Link
                class="page-link"
                v-if="link.url != ''"
                :href="link.url"
                v-html="link.label"
            />
        </li>
    </ul>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ links: Array });
</script>
