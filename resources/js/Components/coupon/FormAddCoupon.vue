<script setup>
import { useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
// import { watch, ref, getCurrentInstance } from "vue";
// import axios from "axios";
const toastr = useToastr();
const form = useForm({
    title: null,
    code: null,
    coupon_type: 1,
    limit: null,
    start_date: null,
    expire_date: null,
    min_purchase: 0,
    max_discount: 0,
    discount_type: 1,
    discount_value: null,
});
function submit() {
    form.post("/coupon/store", {
        preserveScroll: false,
        onSuccess: () => {
            form.reset();
            toastr.success("Coupon Created.");
        },
        onError: () => {
            toastr.error("Invalid Input.");
        },
    });
}
</script>
<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">
                                Title
                                <span class="text-danger">* </span></label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="form.title"
                                class="form-control"
                                placeholder="New coupon"
                                autocomplete="off"
                            />
                            <small v-if="form.errors.title" style="color: red">
                                {{ form.errors.title }}
                            </small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">
                                Coupon Code
                                <span class="text-danger">* </span></label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="form.code"
                                class="form-control"
                                placeholder="Enter Coupon Code"
                                autocomplete="off"
                            />
                            <small v-if="form.errors.code" style="color: red">
                                {{ form.errors.code }}
                            </small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Coupon type </label>
                            <select
                                name=""
                                v-model="form.coupon_type"
                                class="form-control"
                                id=""
                            >
                                <option value="1">--Default--</option>
                                <option value="0">First Order</option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-6 col-md-6 col-lg-6"
                        v-if="form.coupon_type == 1"
                    >
                        <div class="form-group">
                            <label for=""> Limit for same user </label>
                            <input
                                type="number"
                                name="name"
                                v-model="form.limit"
                                class="form-control"
                                placeholder="Ex : 10"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Start Date </label>
                            <input
                                type="date"
                                v-model="form.start_date"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Expire Date </label>
                            <input
                                type="date"
                                v-model="form.expire_date"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Discount Type </label>
                            <select
                                name=""
                                v-model="form.discount_type"
                                class="form-control"
                                id=""
                            >
                                <option value="1">Percent</option>
                                <option value="0">Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">
                                Discount ({{
                                    form.discount_type == 1 ? "%" : "Amount"
                                }})
                                <span class="text-danger">* </span>
                            </label>
                            <input
                                type="number"
                                v-model="form.discount_value"
                                class="form-control"
                            />
                            <small
                                v-if="form.errors.discount_value"
                                style="color: red"
                            >
                                {{ form.errors.discount_value }}
                            </small>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for=""> Min purchase </label>
                            <input
                                type="number"
                                name="name"
                                v-model="form.min_purchase"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-6 col-md-6 col-lg-6"
                        v-if="form.discount_type == 1"
                    >
                        <div class="form-group">
                            <label for=""> Max discount </label>
                            <input
                                type="number"
                                name="name"
                                v-model="form.max_discount"
                                class="form-control"
                            />
                        </div>
                    </div>
                </div>
                <hr />
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>
