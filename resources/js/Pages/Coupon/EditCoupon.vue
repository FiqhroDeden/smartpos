<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({ coupon: Object });
const form = useForm(props.coupon);
const toastr = useToastr();

function submit() {
    form.post("/coupon/update", {
        preserveScroll: false,
        onSuccess: () => {
            form.reset();
            toastr.success("Coupon Updated.");
        },
        onError: () => {
            toastr.error("Invalid Input.");
        },
    });
}
</script>

<template>
    <Head title="Edit  Coupon" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Coupon</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Coupon</li>
                                <li class="breadcrumb-item active">
                                    Edit Coupon
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
                                                        Title
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        v-model="form.title"
                                                        class="form-control"
                                                        placeholder="New coupon"
                                                        autocomplete="off"
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
                                                        Coupon Code
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        v-model="form.code"
                                                        class="form-control"
                                                        placeholder="Enter Coupon Code"
                                                        autocomplete="off"
                                                    />
                                                    <small
                                                        v-if="form.errors.code"
                                                        style="color: red"
                                                    >
                                                        {{ form.errors.code }}
                                                    </small>
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
                                                        v-model="
                                                            form.coupon_type
                                                        "
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="1">
                                                            --Default--
                                                        </option>
                                                        <option value="0">
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
                                                        v-model="form.limit"
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
                                                        v-model="
                                                            form.start_date
                                                        "
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
                                                        v-model="
                                                            form.expire_date
                                                        "
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
                                                        v-model="
                                                            form.min_purchase
                                                        "
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
                                                        v-model="
                                                            form.max_discount
                                                        "
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
                                                        v-model="
                                                            form.discount_value
                                                        "
                                                        class="form-control"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors
                                                                .discount_value
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors
                                                                .discount_value
                                                        }}
                                                    </small>
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
                                                        v-model="
                                                            form.discount_type
                                                        "
                                                        class="form-control"
                                                        id=""
                                                    >
                                                        <option value="1">
                                                            Percent
                                                        </option>
                                                        <option value="0">
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
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </main-layout>
</template>
