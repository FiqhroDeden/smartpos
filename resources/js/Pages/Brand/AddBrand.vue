<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Brand" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Brand</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Brand</li>
                                <li class="breadcrumb-item active">
                                    Add Brand
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
                                                    <label for=""
                                                        >Brand Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Add Brand name"
                                                    />
                                                    <input
                                                        name="position"
                                                        value="0"
                                                        class="d-none"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <label>Image</label
                                                ><small class="text-danger"
                                                    >* ( Ratio 1:1 )</small
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
                        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                            <hr />
                            <div class="card">
                                <div class="card-header">
                                    <div class="row container-fluid">
                                        <div
                                            class="col-12 col-sm-4 col-md-6 col-lg-7 col-xl-8"
                                        >
                                            <h5>
                                                Brand table
                                                <span class="text-danger"
                                                    >(2)</span
                                                >
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                    >
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <img
                                                        src="https://6pos.6amtech.com/storage/app/public/category/2022-09-20-6329531fd69ec.png"
                                                        width="50"
                                                        height="50"
                                                        onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                                                    />
                                                </td>
                                                <td>
                                                    Fashion &amp; Lifestyles
                                                </td>

                                                <td>
                                                    <Link
                                                        href="#"
                                                        type="button"
                                                        class="btn btn-sm btn-warning"
                                                        ><i
                                                            class="fas fa-edit"
                                                        ></i
                                                    ></Link>
                                                    &nbsp;
                                                    <Link
                                                        href="#"
                                                        type="button"
                                                        class="btn btn-sm btn-danger"
                                                        ><i
                                                            class="fas fa-trash"
                                                        ></i
                                                    ></Link>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <img
                                                        src="https://6pos.6amtech.com/storage/app/public/category/2022-09-20-6329531fd69ec.png"
                                                        width="50"
                                                        height="50"
                                                        onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                                                    />
                                                </td>
                                                <td>
                                                    Fashion &amp; Lifestyles
                                                </td>

                                                <td>
                                                    <Link
                                                        href="#"
                                                        type="button"
                                                        class="btn btn-sm btn-warning"
                                                        ><i
                                                            class="fas fa-edit"
                                                        ></i
                                                    ></Link>
                                                    &nbsp;
                                                    <Link
                                                        href="#"
                                                        type="button"
                                                        class="btn btn-sm btn-danger"
                                                        ><i
                                                            class="fas fa-trash"
                                                        ></i
                                                    ></Link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr />
                                    <table>
                                        <tfoot></tfoot>
                                    </table>
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
