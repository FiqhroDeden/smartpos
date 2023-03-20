<script setup>
import { Head, Link } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Customer List" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Customer List</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Supplier</li>
                                <li class="breadcrumb-item active">
                                    List Customer
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
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                name="table_search"
                                                class="form-control float-right"
                                                placeholder="Search By Name or phone"
                                            />

                                            <div class="input-group-append">
                                                <button
                                                    type="submit"
                                                    class="btn btn-default"
                                                >
                                                    <i
                                                        class="fas fa-search"
                                                    ></i>
                                                </button>
                                            </div>
                                        </div>
                                    </h3>

                                    <div class="card-tools">
                                        <Link
                                            :href="route('customer.add')"
                                            class="btn btn-primary nav-link"
                                            ><i class="fa fa-plus"></i>Add New
                                            Customer</Link
                                        >
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table
                                        class="table table-hover text-nowrap"
                                    >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>IMAGE</th>
                                                <th>NAME</th>
                                                <th>PHONE</th>
                                                <th>ORDERS</th>
                                                <th>BALANCE</th>
                                                <th>ACTIONS</th>
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
                                                <td>Kevin Anderson</td>
                                                <td>12066599175</td>
                                                <td>12</td>
                                                <td>
                                                    0 $
                                                    <button
                                                        class="btn btn-sm btn-info"
                                                    >
                                                        <i
                                                            class="fa fa-plus-circle"
                                                        ></i
                                                        >Add balance
                                                    </button>
                                                </td>

                                                <td align="center">
                                                    <button
                                                        class="btn btn-sm btn-warning"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </button>

                                                    <button
                                                        class="btn btn-sm btn-danger"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </button>
                                                    <br />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
