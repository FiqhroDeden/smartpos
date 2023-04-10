<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { inject } from "vue";
import { useToastr } from "@/toastr.js";
import MainLayout from "@/Layouts/MainLayout.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";
import Pagination from "@/Shared/Pagination.vue";

const toastr = useToastr();
const props = defineProps({
    customers: Object,
    numbers: Number,
    accounts: Object,
});

const Swal = inject("$swal");
function deleteConfirm(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.post(route("customer.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Customer has been deleted.", "success");
        }
    });
}

let url = "/customer/list";

const balanceForm = useForm({
    customer_id: null,
    amount: null,
    account_id: null,
    description: null,
    date: null,
});
function addBalance(value) {
    balanceForm.customer_id = value.id;
}
function submitBalance() {
    balanceForm.post(route("customer.addbalance"), {
        preserveScroll: true,
        replace: true,
        onSuccess: () => {
            balanceForm.reset();
            $("#addBalance").modal("hide");
            toastr.success("Customer Balance Updated.");
        },
        onError: () => {
            toastr.error("Invalid Input");
        },
    });
}
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
                                    <a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Customer</li>
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
                                        <SearchFilter
                                            :url="url"
                                            :placeholder="'Search Customer by name or phone number'"
                                        />
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
                                                <!-- <th>IMAGE</th> -->
                                                <th>NAME</th>
                                                <th>PHONE</th>
                                                <th>ORDERS</th>
                                                <th>BALANCE</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    customer, index
                                                ) in customers.data"
                                                :key="customer.id"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <!-- <td>
                                                    <img
                                                        src="https://6pos.6amtech.com/storage/app/public/category/2022-09-20-6329531fd69ec.png"
                                                        width="50"
                                                        height="50"
                                                        onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg'"
                                                    />
                                                </td> -->
                                                <td>{{ customer.name }}</td>
                                                <td>{{ customer.phone }}</td>
                                                <td>12</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            {{
                                                                customer.balance
                                                            }}
                                                            $
                                                        </div>
                                                        <div class="col-4">
                                                            <span
                                                                type="button"
                                                                class="badge badge-info p-1"
                                                                data-toggle="modal"
                                                                data-target="#addBalance"
                                                                @click="
                                                                    addBalance(
                                                                        customer
                                                                    )
                                                                "
                                                            >
                                                                <i
                                                                    class="fa fa-plus-circle"
                                                                ></i>
                                                                Add balance
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <Link
                                                        :href="
                                                            route(
                                                                'customer.view',
                                                                customer.id
                                                            )
                                                        "
                                                        class="btn btn-sm btn-info"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-eye"
                                                        ></i>
                                                    </Link>
                                                    <Link
                                                        :href="
                                                            route(
                                                                'customer.edit',
                                                                customer.id
                                                            )
                                                        "
                                                        class="btn btn-sm btn-warning ml-2"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </Link>

                                                    <button
                                                        @click="
                                                            deleteConfirm(
                                                                customer.id
                                                            )
                                                        "
                                                        class="btn btn-sm btn-danger ml-2"
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
                                <div
                                    class="card-footer clearfix"
                                    v-if="numbers > 10"
                                >
                                    <Pagination :links="customers.links" />
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
    <div
        class="modal fade"
        id="addBalance"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Update Customer Balance
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form
                    @submit.prevent="submitBalance"
                    enctype="multipart/form-data"
                >
                    <input type="hidden" v-model="balanceForm.customer_id" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Balance </label>
                                    <input
                                        type="number"
                                        v-model="balanceForm.amount"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for=""
                                        >Balance receive account
                                    </label>
                                    <select
                                        name="account"
                                        v-model="balanceForm.account_id"
                                        id=""
                                        class="form-control"
                                        required
                                    >
                                        <option :value="null">
                                            -- Select --
                                        </option>
                                        <option
                                            :value="account.id"
                                            v-for="account in accounts"
                                            :key="account.id"
                                        >
                                            {{ account.title }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Description </label>
                                    <input
                                        type="text"
                                        v-model="balanceForm.description"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Date </label>
                                    <input
                                        type="date"
                                        v-model="balanceForm.date"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
