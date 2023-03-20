<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Coupon" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Coupon</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Coupon</li>
                                <li class="breadcrumb-item active">
                                    Add Coupon
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
                                                        Title
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="New coupon"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Coupon Code
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Enter Coupon Code"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Coupon type
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Default--
                                                        </option>
                                                        <option value="">
                                                            First Order
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Limit for same user
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Ex : 10"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Start Date
                                                    </label>
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Expire Date
                                                    </label>
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Min purchase
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        class="form-control"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Max discount
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        class="form-control"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span>
                                                    </label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount Type
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Coupon Table</h3>

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
                                                <th>TITLE</th>
                                                <th>CODE</th>
                                                <th>MIN PURCHASE</th>
                                                <th>MAX DISCOUNT</th>
                                                <th>DISCOUNT</th>
                                                <th>DISCOUNT TYPE</th>
                                                <th>START DATE</th>
                                                <th>EXPIRE DATE</th>
                                                <th>STATUS</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Welcome Coupon</td>
                                                <td>first</td>

                                                <td>100.00 $</td>
                                                <td>500.00 $</td>
                                                <td>20.00 $</td>
                                                <td>percent</td>
                                                <td>2022-09-20</td>
                                                <td>2023-01-30</td>
                                                <td>
                                                    <div class="form-group">
                                                        <div
                                                            class="custom-control custom-switch"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="customSwitch1"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="customSwitch1"
                                                            ></label>
                                                        </div>
                                                    </div>
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
