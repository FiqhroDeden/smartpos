<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Supplier" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Supplier</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Supplier</li>
                                <li class="breadcrumb-item active">
                                    Add Supplier
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
                                                        Supplier Name
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Supplier name"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Phone
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Phone Number"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Email
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Ex: example@gmail.com"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        State
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="State"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for=""> City </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="City"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Zip Code
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Zip Code"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Address
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Address"
                                                    />
                                                </div>
                                            </div>

                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
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
