<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({ account: Object });
const toastr = useToastr();
const form = useForm(props.account);

function submit() {
    form.post(route("account.update"), {
        onSuccess: () => {
            form.reset();
            toastr.success("Account Update.");
        },
        onError: () => {
            toastr.error("Invalid Input");
        },
    });
}
</script>

<template>
    <Head title="Add New Account" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add New Account</h1>
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
                                    Add Account
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
                                        @submit.prevent="submit"
                                        enctype="multipart/form-data"
                                    >
                                        <input
                                            type="hidden"
                                            v-model="form.id"
                                        />
                                        <div class="row">
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Account Title
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="title"
                                                        v-model="form.title"
                                                        class="form-control"
                                                        placeholder="Account Title"
                                                        required
                                                    />
                                                    <small
                                                        v-if="form.errors.title"
                                                        style="color: red"
                                                    >
                                                        {{ form.errors.title }}
                                                    </small>
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
                                                        name="description"
                                                        v-model="
                                                            form.description
                                                        "
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
                                                        Account Number
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="account_number"
                                                        v-model="
                                                            form.account_number
                                                        "
                                                        class="form-control"
                                                        placeholder="Account number"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors
                                                                .acccount_number
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors
                                                                .acccount_number
                                                        }}
                                                    </small>
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
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
