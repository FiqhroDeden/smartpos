<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Shop Setup" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Shop Setup</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Setting</li>
                                <li class="breadcrumb-item active">
                                    Shop Setup
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
                                                        Shop name
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="6pos Super shop"
                                                        placeholder="Shop name"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Shop Phone
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="+000123456789"
                                                        placeholder="Phone Number"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Shop email
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="demo@6amtech.com"
                                                        placeholder="Ex: example@gmail.com"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Shop address
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="House: 00, Road: 00, City: Demo, United State"
                                                        placeholder="Shop address"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Pagination limit
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        class="form-control"
                                                        value="20"
                                                        placeholder="Pagination Limit"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Currency
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            USD ($)
                                                        </option>
                                                        <option value="">
                                                            IDR (Rp)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Country
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            United States
                                                        </option>
                                                        <option value="">
                                                            Indonesia
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Footer text
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="All rights reserved."
                                                        placeholder="Footer Text"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Reorder level
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="50"
                                                        placeholder="Stock Limit"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Country
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            (UTC+06:00) DHAKA
                                                        </option>
                                                        <option value="">
                                                            (UTC+06:00) ALMATY
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <label
                                                    >Logo
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
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
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        VAT Registration No
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="DHUJ77788VV"
                                                        placeholder="Registration No"
                                                    />
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
