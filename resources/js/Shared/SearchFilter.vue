<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
let keyword = ref("");

const props = defineProps({ url: String, placeholder: String });
function search() {
    router.get(
        props.url,
        { search: keyword.value },
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
            v-model="keyword"
            class="form-control float-right"
            :placeholder="placeholder"
            autocomplete="off"
        />
        <div class="input-group-append">
            <button @click="search" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <!-- <Link :href="route('category.list')" style="margin-left: 5px"
            >Reset</Link
        > -->
    </div>
</template>
