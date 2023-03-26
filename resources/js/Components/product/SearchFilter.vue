<script setup></script>

<template>
    <div class="input-group">
        <input
            type="text"
            name="table_search"
            v-model="search"
            class="form-control float-right"
            placeholder="Search product by name"
        />
        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</template>
