<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head>
        <title>Stock Limit Product List</title>
    </Head>
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                Stock Limit Product List
                                <span class="right badge badge-info">36</span>
                            </h1>
                            <p class="mute">
                                The products are shown in this list which
                                quantity is below 50
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Stock Limit Product
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
                                    <!-- <h3 class="card-title">
                                        Responsive Hover Table
                                    </h3> -->

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
                                                <th>NAME</th>
                                                <th>IMAGE</th>
                                                <th>SUPPLIER NAME/PHONE</th>
                                                <th>PRODUCT CODE</th>
                                                <th>PURCHASE PRICE</th>
                                                <th>SELLING PRICE</th>
                                                <th>QUANTITY</th>
                                                <th>ORDERS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Marvel School bag</td>
                                                <td>
                                                    <img
                                                        class="img-one-plst"
                                                        src="https://6pos.6amtech.com/storage/app/public/product/2022-09-20-6329858e34093.png"
                                                        onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                                                        width="50"
                                                        height="50"
                                                    />
                                                </td>

                                                <td>
                                                    Extreme Stationary
                                                    <hr />
                                                    8801737889916
                                                </td>
                                                <td>69418</td>
                                                <td>1400 $</td>
                                                <td>1900 $</td>
                                                <td>
                                                    15
                                                    <i
                                                        class="fas fa-plus-circle"
                                                    ></i>
                                                </td>
                                                <td>1</td>
                                                <td align="center">
                                                    <button
                                                        class="btn btn-sm btn-warning"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </button>
                                                    <br />
                                                    <button
                                                        class="btn btn-sm btn-danger"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </button>
                                                    <br />
                                                    <button
                                                        class="btn btn-sm btn-info"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-barcode"
                                                        ></i>
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
