<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Sub Category" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Sub Category</h1>
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
                                                        >Sub Category
                                                        name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Add sub category name"
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
                                                <div class="form-group">
                                                    <label for=""
                                                        >Main Category</label
                                                    >
                                                    <small class="text-danger"
                                                        >*</small
                                                    >
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            -- Select --
                                                        </option>
                                                        <option value="">
                                                            Fasion
                                                        </option>
                                                        <option value="">
                                                            Electronic
                                                        </option>
                                                    </select>
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
                                                Category table
                                                <span class="text-danger"
                                                    >(2)</span
                                                >
                                            </h5>
                                        </div>
                                        <div
                                            class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
                                        >
                                            <form
                                                action="https://6pos.6amtech.com/admin/category/add"
                                                method="GET"
                                            >
                                                <div
                                                    class="input-group input-group-merge input-group-flush"
                                                >
                                                    <div
                                                        class="input-group-prepend"
                                                    >
                                                        <div
                                                            class="input-group-text"
                                                        >
                                                            <i
                                                                class="fa fa-search"
                                                            ></i>
                                                        </div>
                                                    </div>
                                                    <input
                                                        id="datatableSearch_"
                                                        type="search"
                                                        name="search"
                                                        class="form-control"
                                                        placeholder="Search by category"
                                                        aria-label="Search orders"
                                                        value=""
                                                        required=""
                                                    />
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary"
                                                    >
                                                        Search
                                                    </button>
                                                </div>
                                            </form>
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
                                                <th>Main Category</th>
                                                <th>Sub Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Fashion & Lifestyles</td>
                                                <td>Bags & Travels</td>
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
                                                <td>Fashion & Lifestyles</td>
                                                <td>Man</td>
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
