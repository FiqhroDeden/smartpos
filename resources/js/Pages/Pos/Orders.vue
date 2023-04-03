<script setup>
import { onMounted, ref, reactive } from "vue";
import { Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";
import Pagination from "@/Shared/Pagination.vue";

const props = defineProps({ orders: Object, numbers: Number });
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = {
        day: "numeric",
        month: "short",
        year: "numeric",
        hour: "numeric",
        minute: "numeric",
        hour12: true,
    };
    return date.toLocaleDateString("en-US", options);
}
const url = ref("/pos/orders");

const invoice = reactive({
    order_code: null,
    created_at: null,
    order_amount: null,
    total_tax: null,
    extra_discount: null,
    coupon_discount: null,
    collected_amount: null,
    paid_amount: null,
    order_items: [],
});

function printInvoice(data) {
    invoice.order_code = data.order_code;
    invoice.created_at = data.created_at;
    invoice.order_items = data.order_items;
    invoice.order_amount = data.order_amount;
    invoice.total_tax = data.total_tax;
    invoice.extra_discount = data.extra_discount;
    invoice.coupon_discount = data.coupon_discount;
    invoice.collected_amount = data.collected_amount;
    invoice.paid_amount = data.paid_amount;
}
function print() {
    const printArea = document.getElementById("printarea");
    const printContent = printArea.innerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
    location.reload();
}
</script>
<!-- <style>
@import "datatables.net-bs4";
</style> -->
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
                                <span class="right badge badge-info">{{
                                    numbers
                                }}</span>
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
                                        <SearchFilter
                                            :url="url"
                                            :placeholder="'Search order by code'"
                                        />
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table
                                        class="table table-hover text-nowrap display"
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
                                            <tr
                                                v-for="(
                                                    order, index
                                                ) in orders.data"
                                                :key="order.id"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ order.order_code }}</td>
                                                <td>
                                                    {{
                                                        formatDate(
                                                            order.created_at
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    {{ order.payment_method }}
                                                </td>
                                                <td>
                                                    {{ order.order_amount }} $
                                                </td>
                                                <td>{{ order.total_tax }} $</td>
                                                <td>
                                                    {{ order.extra_discount }} $
                                                </td>
                                                <td>
                                                    {{ order.coupon_discount }}
                                                    $
                                                </td>
                                                <td>
                                                    {{ order.paid_amount }} $
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-primary"
                                                        target="_blank"
                                                        data-toggle="modal"
                                                        data-target="#printInvoice"
                                                        @click="
                                                            printInvoice(order)
                                                        "
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
                                <div
                                    class="card-footer clearfix"
                                    v-if="numbers > 10"
                                >
                                    <Pagination :links="orders.links" />
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
        <div
            class="modal fade"
            id="printInvoice"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Print invoice
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
                    <div class="modal-body row font-i1">
                        <div class="col-md-12">
                            <center>
                                <button
                                    class="mt-2 btn btn-primary non-printable"
                                    @click="print"
                                >
                                    Proceed, If thermal printer is ready
                                </button>
                                <button
                                    data-dismiss="modal"
                                    class="mt-2 ml-2 btn btn-danger non-printable"
                                >
                                    Back
                                </button>
                            </center>
                            <hr class="non-printable" />
                        </div>
                        <div class="row m-auto" id="printarea">
                            <div class="width-inone">
                                <div class="text-center mb-3">
                                    <h2 class="line-inone">6pos Super shop</h2>
                                    <h5 class="style-inone">
                                        House: 00, Road: 00, City: Demo, United
                                        State
                                    </h5>
                                    <h5 class="style-intwo">
                                        Phone : +000123456789
                                    </h5>
                                    <h5 class="style-intwo">
                                        Email : demo@6amtech.com
                                    </h5>
                                    <h5 class="style-intwo">
                                        Vat registration number : DHUJ77788VV
                                    </h5>
                                </div>
                                <hr class="line-dot" />
                                <center class="mt-3">
                                    <h5>
                                        Order ID :
                                        {{ invoice.order_code }}
                                    </h5>
                                    <h5 class="font-inone fz-10">
                                        {{ formatDate(invoice.created_at) }}
                                    </h5>
                                </center>
                                <h5 class="text-uppercase"></h5>
                                <hr class="line-dot" />
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>DESC</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(
                                                orderItem, index
                                            ) in invoice.order_items"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>
                                                <span class="style-inthree">{{
                                                    orderItem.product.name
                                                }}</span
                                                ><br />
                                                Price :
                                                {{
                                                    orderItem.product
                                                        .selling_price
                                                }}
                                                $ <br />
                                                Discount :
                                                {{
                                                    orderItem.product
                                                        .discount_type
                                                        ? (orderItem.product
                                                              .selling_price *
                                                              orderItem.product
                                                                  .discount_value) /
                                                          100
                                                        : orderItem.product
                                                              .selling_price -
                                                          orderItem.product
                                                              .discount_value
                                                }}
                                                $
                                            </td>
                                            <td class="">
                                                {{ orderItem.quantity }}
                                            </td>
                                            <td>
                                                {{
                                                    orderItem.price *
                                                    orderItem.quantity
                                                }}
                                                $
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="line-dot" />
                                <dl class="row text-black-50">
                                    <dt class="col-7">Items price:</dt>
                                    <dd class="col-5 text-right">
                                        {{ invoice.order_amount }} $
                                    </dd>
                                    <dt class="col-7">Tax / VAT:</dt>
                                    <dd class="col-5 text-right">
                                        {{ invoice.total_tax }} $
                                    </dd>
                                    <dt class="col-7">Subtotal:</dt>
                                    <dd class="col-5 text-right">
                                        {{
                                            invoice.order_amount +
                                            invoice.total_tax
                                        }}
                                        $
                                    </dd>
                                    <dt class="col-7">Extra discount:</dt>
                                    <dd class="col-5 text-right">
                                        {{ invoice.extra_discount }} $
                                    </dd>
                                    <dt class="col-7">Coupon discount:</dt>
                                    <dd class="col-5 text-right">
                                        {{ invoice.extra_discount }} $
                                    </dd>
                                    <dt class="col-7 total">Total:</dt>
                                    <dd class="col-5 text-right total">
                                        {{ invoice.paid_amount }} $
                                    </dd>
                                </dl>
                                <div
                                    class="d-flex flex-wrap justify-content-between border-top"
                                >
                                    <span>Paid by: Cash</span>
                                    <span
                                        >Amount:
                                        {{ invoice.collected_amount }}
                                        $</span
                                    >
                                    <span
                                        >Change:
                                        {{
                                            invoice.collected_amount -
                                            invoice.paid_amount
                                        }}
                                        $</span
                                    >
                                </div>
                                <hr class="line-dot" />
                                <h5 class="text-center">"""THANK YOU"""</h5>
                                <hr class="line-dot" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<style scoped>
@media print {
    /* Atur margin dan padding pada halaman cetak */
    @page {
        margin: 0;
        padding: 0;
    }

    /* Atur lebar konten pada halaman cetak */
    .width-inone {
        width: 100mm;
        margin: 0 auto;
        padding: 10mm;
        border: none;
        /* border: 1px solid #ccc; */
        /* border-radius: 10px; */
    }

    /* Sembunyikan bagian footer ketika dicetak */
    .no-print {
        display: none;
    }
}
</style>
