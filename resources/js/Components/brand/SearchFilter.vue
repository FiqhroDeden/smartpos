<template>
    <div class="input-group input-group-sm">
        <input
            type="text"
            name="table_search"
            v-model="search"
            class="form-control float-right"
            placeholder="Search"
        />

        <Link :href="route('brand.list')" style="margin-left: 5px">Reset</Link>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
let search = ref("");

watch(search, (value) => {
    router.get(
        "/brand/list",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>
