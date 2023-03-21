<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import TableCategory from "@/Components/category/TableCategory.vue";
import AddCategory from "@/Components/category/AddCategory.vue";

defineProps({ categories: Object, numbers: Number });
</script>

<template>
    <Head title="List Category" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">List Category</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Category</li>
                                <li class="breadcrumb-item active">
                                    List Category
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
                            <TableCategory
                                :categories="categories"
                                :numbers="numbers"
                            />
                        </div>
                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-2">
                            <AddCategory />
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
