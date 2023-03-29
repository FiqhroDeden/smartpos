<script setup>
import { Head } from "@inertiajs/vue3";

import MainLayout from "@/Layouts/MainLayout.vue";
import BrandTable from "@/Components/brand/BrandTable.vue";
import AddBrand from "@/Components/brand/AddBrand.vue";

defineProps({ brands: Object, numbers: Number });
</script>

<template>
    <Head title="Brand List" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Brand List</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Brand</li>
                                <li class="breadcrumb-item active">
                                    Brand List
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
                    <div class="row gx-2 gx-lg-3">
                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-2">
                            <BrandTable :brands="brands" :numbers="numbers" />
                        </div>
                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-2">
                            <AddBrand />
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
