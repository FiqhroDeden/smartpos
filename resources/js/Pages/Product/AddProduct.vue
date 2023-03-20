<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Product" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Product</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">
                                    Add Product
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
                        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <form
                                        action="https://6pos.6amtech.com/admin/category/store"
                                        method="post"
                                        enctype="multipart/form-data"
                                    >
                                        <input
                                            type="hidden"
                                            name="_token"
                                            value="6ygODdB6JbOb9ADW7Y8V6KxAynhVeLQVmC3DALxc"
                                        />
                                        <div class="row">
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Name
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Product name"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Product code SKU
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Product code"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Brand
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="">
                                                            Gucci
                                                        </option>
                                                        <option value="">
                                                            Dior
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Quantity
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Quantity"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Unit type
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span>
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="">
                                                            Kg
                                                        </option>
                                                        <option value="">
                                                            Ltr
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Unit Value
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Unit value"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Category
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span>
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="">
                                                            Food
                                                        </option>
                                                        <option value="">
                                                            Cooking Essentials
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Sub Category
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Selling Price
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Selling Price"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Purchase price
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Purchase price"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount type
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            Percent
                                                        </option>
                                                        <option value="">
                                                            Amount
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount percent (%)
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Discount"
                                                    />
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Tax in percent (%)
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Tax"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Select supplier
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="">
                                                            Keysan
                                                            (0822481210240)
                                                        </option>
                                                        <option value="">
                                                            Adelar
                                                            (0856518182619)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-12 col-md-12 col-lg-12"
                                            >
                                                <label>Image</label>
                                                <div class="custom-file">
                                                    <input
                                                        type="file"
                                                        name="image"
                                                        id="customFileEg1"
                                                        class="custom-file-input"
                                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                                        required=""
                                                    />
                                                    <label
                                                        class="custom-file-label"
                                                        for="customFileEg1"
                                                        >Choose file
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 from_part_2">
                                                <div class="form-group">
                                                    <hr />
                                                    <center>
                                                        <img
                                                            class="img-one-cati"
                                                            id="viewer"
                                                            src="https://6pos.6amtech.com/public/assets/admin/img/400x400/img2.jpg"
                                                            alt="Image"
                                                        />
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
