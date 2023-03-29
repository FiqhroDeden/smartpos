<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

let sort = ref("default");
const props = defineProps({ url: String });
watch(sort, (value) => {
    router.get(
        props.url,
        { sort: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>

<template>
    <div>
        <select name="sort" class="form-control" v-model="sort">
            <option value="default" selected="">Default sort</option>
            <option value="quantity_asc">Quantity sort by (low to high)</option>
            <option value="quantity_desc">
                Quantity sort by (high to low)
            </option>
            <option value="order_asc">Order sort by (low to high)</option>
            <option value="order_desc">Order sort by (high to low)</option>
        </select>
    </div>
</template>
