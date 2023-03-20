<script setup>
import { Head, Link } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Supplier List" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Supplier List</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Supplier</li>
                                <li class="breadcrumb-item active">
                                    List Supplier
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
                                            :href="route('supplier.add')"
                                            class="btn btn-primary nav-link"
                                            ><i class="fa fa-plus"></i>Add New
                                            Supplier</Link
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
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>PHONE</th>
                                                <th>PRODUCTS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Extreme Stationary</td>
                                                <td>Extreme@gmail.com</td>
                                                <td>8801737889916</td>
                                                <td>
                                                    <span
                                                        class="badge badge-info"
                                                        >16</span
                                                    >
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
