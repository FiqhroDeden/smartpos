<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import { inject } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({ accounts: Object });
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
            router.post(route("account.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Account has been deleted.", "success");
        }
    });
}
</script>

<template>
    <Head title="Account List" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Account List</h1>
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
                                    List Accounts
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
                                        <!-- <div class="input-group">
                                            <input
                                                type="text"
                                                name="table_search"
                                                class="form-control float-right"
                                                placeholder="Search By Account Title"
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
                                        </div> -->
                                    </h3>

                                    <div class="card-tools">
                                        <Link
                                            :href="route('account.add')"
                                            class="btn btn-primary nav-link"
                                            ><i class="fa fa-plus"></i>Add New
                                            Account</Link
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
                                                <th>ACCOUNT INFO</th>
                                                <th>BALANCE INFO</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    account, index
                                                ) in accounts"
                                                :key="account.id"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    {{ account.title }}
                                                    <br />{{
                                                        account.account_number
                                                    }}
                                                    <br />{{
                                                        account.description
                                                    }}
                                                </td>
                                                <td>
                                                    Balance :
                                                    {{ account.balance }} $
                                                    <br />
                                                    Total In :
                                                    {{ account.in }} $
                                                    <br />
                                                    Total Out :
                                                    {{ account.out }} $
                                                </td>

                                                <td v-if="!account.default">
                                                    <Link
                                                        :href="
                                                            route(
                                                                'account.edit',
                                                                account.id
                                                            )
                                                        "
                                                        class="btn btn-sm btn-warning mr-2"
                                                        target="_blank"
                                                    >
                                                        <i
                                                            class="fas fa-edit"
                                                        ></i>
                                                    </Link>

                                                    <button
                                                        class="btn btn-sm btn-danger"
                                                        target="_blank"
                                                        @click="
                                                            deleteConfirm(
                                                                account.id
                                                            )
                                                        "
                                                    >
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </button>
                                                    <br />
                                                </td>
                                                <td v-else>Default</td>
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
