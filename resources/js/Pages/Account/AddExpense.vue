<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Add New Expense" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Expense</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    Account Management
                                </li>
                                <li class="breadcrumb-item active">
                                    Add Expense
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
                                                        Account
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="">
                                                            Standar
                                                        </option>
                                                        <option value="">
                                                            Cash
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Description
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Description"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Amount
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="Initial Balance"
                                                    />
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for=""> Date </label>
                                                    <input
                                                        type="date"
                                                        name="name"
                                                        class="form-control"
                                                    />
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
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Expense List</h1>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div
                                        class="row justify-content-between align-items-center flex-grow-1"
                                    >
                                        <div
                                            class="col-12 col-md-6 col-lg-5 mb-3 mb-lg-0"
                                        >
                                            <form
                                                action="https://6pos.6amtech.com/admin/account/add-expense"
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
                                                        placeholder="Search by description"
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
                                        <div class="col-12 col-lg-7">
                                            <form
                                                action="https://6pos.6amtech.com/admin/account/add-expense"
                                                method="GET"
                                            >
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label
                                                                class="input-label"
                                                                for="exampleFormControlInput1"
                                                                >From
                                                            </label>
                                                            <input
                                                                id="from_date"
                                                                type="date"
                                                                name="from"
                                                                class="form-control"
                                                                value=""
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label
                                                                class="input-label"
                                                                for="exampleFormControlInput1"
                                                                >To
                                                            </label>
                                                            <input
                                                                id="to_date"
                                                                type="date"
                                                                name="to"
                                                                class="form-control"
                                                                value=""
                                                                required=""
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button
                                                            href=""
                                                            class="btn btn-success mt-4"
                                                        >
                                                            Filter
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card-tools"></div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table
                                        class="table table-hover text-nowrap"
                                    >
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>ACCOUNT</th>
                                                <th>TYPE</th>
                                                <th>AMOUNT</th>
                                                <th>DESCRIPTION</th>
                                                <th>DEBIT</th>
                                                <th>CREDIT</th>
                                                <th>BALANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2022-09-20</td>
                                                <td>Cash</td>
                                                <td>
                                                    <span
                                                        class="badge badge-danger"
                                                        >Expanse</span
                                                    >
                                                </td>

                                                <td>3500 $</td>
                                                <td>Buy products</td>
                                                <td>3500 $</td>
                                                <td>0 $</td>
                                                <td>8569.78 $</td>
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
