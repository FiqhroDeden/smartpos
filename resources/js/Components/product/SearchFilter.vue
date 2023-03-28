<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
let search = ref("");

function searchProduct() {
    router.get(
        "/product/list",
        { search: search.value },
        {
            preserveState: true,
            replace: true,
        }
    );
}
// watch(search, (value) => {
//     router.get(
//         "/category/list",
//         { search: value },
//         {
//             preserveState: true,
//             replace: true,
//         }
//     );
// });
</script>

<template>
    <div class="input-group">
        <input
            type="text"
            name="table_search"
            v-model="search"
            class="form-control float-right"
            placeholder="Search product by name"
            autocomplete="off"
        />
        <div class="input-group-append">
            <button @click="searchProduct" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <!-- <Link :href="route('category.list')" style="margin-left: 5px"
            >Reset</Link
        > -->
    </div>
</template>
