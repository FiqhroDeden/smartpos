<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import TableProduct from "@/Components/product/TableProduct.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";
import SortFilter from "@/Shared/SortFilter.vue";

defineProps({ products: Object, totalProducts: Number });

const url = ref("/product/list");
</script>

<template>
    <Head>
        <title>Product List</title>
    </Head>
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                Product List
                                <span class="right badge badge-info">{{
                                    totalProducts
                                }}</span>
                            </h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">
                                    Product List
                                </li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <SearchFilter
                                            :url="url"
                                            :placeholder="'Search product by name'"
                                        />
                                    </h3>

                                    <div class="card-tools">
                                        <SortFilter :url="url" />
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <TableProduct :products="products" />
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
