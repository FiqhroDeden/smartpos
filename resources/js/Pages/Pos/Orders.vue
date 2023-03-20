<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head>
        <title>Order List</title>
    </Head>
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                Pos Orders
                                <span class="right badge badge-info">23</span>
                            </h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">POS</li>
                                <li class="breadcrumb-item active">Orders</li>
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
                                        Responsive Hover Table
                                    </h3>

                                    <div class="card-tools">
                                        <div
                                            class="input-group input-group-sm"
                                            style="width: 150px"
                                        >
                                            <input
                                                type="text"
                                                name="table_search"
                                                class="form-control float-right"
                                                placeholder="Search"
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
                                                <th>ORDER</th>
                                                <th>DATE</th>
                                                <th>PAYMENT METHOD</th>
                                                <th>ORDER AMOUNT</th>
                                                <th>TOTAL TAX</th>
                                                <th>EXTRA DISCOUNT</th>
                                                <th>COUPON DISCOUNT</th>
                                                <th>PAID AMOUNT</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>100032</td>
                                                <td>20 Sep 2022</td>
                                                <td>Cash</td>
                                                <td>250 $</td>
                                                <td>6 $</td>
                                                <td>0 $</td>
                                                <td>0 $</td>
                                                <td>156 $</td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-download"
                                                        ></i>
                                                        Invoice
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>100032</td>
                                                <td>20 Sep 2022</td>
                                                <td>Cash</td>
                                                <td>250 $</td>
                                                <td>6 $</td>
                                                <td>0 $</td>
                                                <td>0 $</td>
                                                <td>156 $</td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-download"
                                                        ></i>
                                                        Invoice
                                                    </button>
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
