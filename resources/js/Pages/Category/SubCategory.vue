<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import TableSubCategory from "@/Components/subCategory/TableSubCategory.vue";
import AddSubCategory from "@/Components/subCategory/AddSubCategory.vue";

defineProps({
    subCategories: Object,
    numbers: Number,
    categories: Object,
});
</script>

<template>
    <Head title="Sub Category" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Sub Category</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Category</li>
                                <li class="breadcrumb-item active">
                                    Add Sub Category
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
                            <TableSubCategory
                                :categories="categories"
                                :subCategories="subCategories"
                                :numbers="numbers"
                            />
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-2">
                            <AddSubCategory :categories="categories" />
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
