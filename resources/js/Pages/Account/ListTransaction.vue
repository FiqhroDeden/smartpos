<script setup>
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
</script>

<template>
    <Head title="Transaction Lisk" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Transaction List</h1>
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
                                    Transaction List
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
                                <!-- /.card-header -->
                                <form
                                    action="https://6pos.6amtech.com/admin/account/list-transection"
                                    method="GET"
                                >
                                    <div class="row m-1">
                                        <div
                                            class="form-group col-12 col-sm-6 col-md-3 col-lg-3"
                                        >
                                            <label
                                                class="input-label"
                                                for="exampleFormControlInput1"
                                                >Account
                                            </label>
                                            <select
                                                id="account_id"
                                                name="account_id"
                                                class="form-control js-select2-custom select2-hidden-accessible"
                                                data-select2-id="account_id"
                                                tabindex="-1"
                                                aria-hidden="true"
                                            >
                                                <option
                                                    value=""
                                                    data-select2-id="2"
                                                >
                                                    ---Select---
                                                </option>
                                                <option
                                                    value="4"
                                                    data-select2-id="3"
                                                >
                                                    Standard Chartered
                                                </option>
                                                <option
                                                    value="3"
                                                    data-select2-id="4"
                                                >
                                                    Receivable
                                                </option>
                                                <option
                                                    value="2"
                                                    data-select2-id="5"
                                                >
                                                    Payable
                                                </option>
                                                <option
                                                    value="1"
                                                    data-select2-id="6"
                                                >
                                                    Cash
                                                </option>
                                            </select>
                                        </div>
                                        <div
                                            class="form-group col-12 col-sm-6 col-md-3 col-lg-3"
                                        >
                                            <label
                                                class="input-label"
                                                for="exampleFormControlInput1"
                                                >Type
                                            </label>
                                            <select
                                                id="tran_type"
                                                name="tran_type"
                                                class="form-control js-select2-custom select2-hidden-accessible"
                                                data-select2-id="tran_type"
                                                tabindex="-1"
                                                aria-hidden="true"
                                            >
                                                <option
                                                    value=""
                                                    data-select2-id="8"
                                                >
                                                    ---Select---
                                                </option>
                                                <option
                                                    value="Expense"
                                                    data-select2-id="9"
                                                >
                                                    Expense
                                                </option>
                                                <option
                                                    value="Transfer"
                                                    data-select2-id="10"
                                                >
                                                    Transfer
                                                </option>
                                                <option
                                                    value="Income"
                                                    data-select2-id="11"
                                                >
                                                    Income
                                                </option>
                                                <option
                                                    value="Payable"
                                                    data-select2-id="12"
                                                >
                                                    Payable
                                                </option>
                                                <option
                                                    value="Receivable"
                                                    data-select2-id="13"
                                                >
                                                    Receivable
                                                </option>
                                            </select>
                                        </div>
                                        <div
                                            class="form-group col-12 col-sm-6 col-md-3 col-lg-3"
                                        >
                                            <label
                                                class="input-label"
                                                for="exampleFormControlInput1"
                                                >Start date
                                            </label>
                                            <input
                                                id="start_date"
                                                type="date"
                                                name="from"
                                                class="form-control"
                                                value=""
                                            />
                                        </div>
                                        <div
                                            class="form-group col-12 col-sm-6 col-md-3 col-lg-3"
                                        >
                                            <label
                                                class="input-label"
                                                for="exampleFormControlInput1"
                                                >Expire date
                                            </label>
                                            <input
                                                id="end_date"
                                                type="date"
                                                name="to"
                                                class="form-control"
                                                value=""
                                            />
                                        </div>
                                        <div class="col-12">
                                            <div
                                                class="row d-flex justify-content-center"
                                            >
                                                <button
                                                    class="btn btn-success col-3 mr-1"
                                                >
                                                    Filter
                                                </button>
                                                <a
                                                    href="https://6pos.6amtech.com/admin/account/list-transection"
                                                    class="btn btn-danger col-3 mr-1"
                                                    >Reset</a
                                                >
                                                <a
                                                    href="https://6pos.6amtech.com/admin/account/transection-export"
                                                    class="btn btn-info col-3"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title=""
                                                    data-original-title="Export last month data"
                                                    >Export</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                                        class="badge badge-info"
                                                        >Transfer</span
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
