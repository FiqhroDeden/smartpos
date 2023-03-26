<script setup></script>

<template>
    <div>
        <select name="brand_id" class="form-control" id="brand_id">
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
