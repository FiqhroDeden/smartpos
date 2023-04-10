<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { reactive } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import SearchFilter from "@/Shared/SearchFilter.vue";

const props = defineProps({
    customer: Object,
    transactions: Object,
    orders: Object,
});
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

<template>
    <Head title="Supplier List" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Customer Detail</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <Link
                                    :href="route('customer.list')"
                                    class="breadcrumb-item"
                                    >Customer</Link
                                >
                                <li class="breadcrumb-item active">
                                    Customer Detail
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
                    <div class="card-body">
                        <ul
                            class="nav nav-tabs"
                            id="custom-content-above-tab"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="order-list-tab"
                                    data-toggle="pill"
                                    href="#order-list"
                                    role="tab"
                                    aria-controls="order-list"
                                    aria-selected="true"
                                    >Order List</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="transaction-list-tab"
                                    data-toggle="pill"
                                    href="#transaction-list"
                                    role="tab"
                                    aria-controls="transaction-list"
                                    aria-selected="false"
                                    >Transaction List</a
                                >
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <h5 class="ml-2">Customer ID #{{ customer.id }}</h5>
                        <p class="ml-2">
                            Joined At: {{ formatDate(customer.created_at) }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div
                                class="tab-content"
                                id="custom-content-below-tabContent"
                            >
                                <div
                                    class="card tab-pane fade show active"
                                    id="order-list"
                                    role="tabpanel"
                                    aria-labelledby="order-list-tab"
                                >
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <h5>
                                                Order Table
                                                <span
                                                    class="badge badge-info"
                                                    >{{ orders.length }}</span
                                                >
                                            </h5>
                                        </h3>
                                        <div class="card-tools">
                                            <SearchFilter
                                                :url="
                                                    '/customer/view/' +
                                                    customer.id
                                                "
                                                :placeholder="'Search order by order id'"
                                            />
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
                                                    <th>ORDER ID</th>
                                                    <th>TOTAL</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(
                                                        order, index
                                                    ) in orders"
                                                    :key="order.id"
                                                >
                                                    <td>{{ index + 1 }}</td>
                                                    <td>
                                                        {{ order.order_code }}
                                                    </td>
                                                    <td>
                                                        {{ order.paid_amount }}
                                                        $
                                                    </td>
                                                    <td>
                                                        <button
                                                            class="btn btn-sm btn-primary"
                                                            target="_blank"
                                                            data-toggle="modal"
                                                            data-target="#printInvoice"
                                                            @click="
                                                                printInvoice(
                                                                    order
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fas fa-download"
                                                            ></i>
                                                            Invoice
                                                        </button>

                                                        <br />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div
                                    class="card tab-pane fade"
                                    id="transaction-list"
                                    role="tabpanel"
                                    aria-labelledby="transaction-list-tab"
                                >
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <h5>
                                                Transaction List
                                                <span
                                                    class="badge badge-info"
                                                    >{{
                                                        transactions.length
                                                    }}</span
                                                >
                                            </h5>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table
                                            class="table table-hover text-nowrap"
                                        >
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ACCOUNT</th>
                                                    <th>TYPE</th>
                                                    <th>AMOUT</th>
                                                    <th>DATE</th>
                                                    <th>DEBIT</th>
                                                    <th>CREDIT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(
                                                        transaction, index
                                                    ) in transactions"
                                                    :key="transaction.id"
                                                >
                                                    <td>{{ index + 1 }}</td>
                                                    <td>
                                                        {{
                                                            transaction.account
                                                                .title
                                                        }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            :class="
                                                                transaction.type ==
                                                                'Income'
                                                                    ? 'badge badge-success'
                                                                    : 'badge badge-warning'
                                                            "
                                                            >{{
                                                                transaction.type
                                                            }}</span
                                                        >
                                                    </td>
                                                    <td>
                                                        {{ transaction.amount }}
                                                    </td>
                                                    <td>
                                                        {{ transaction.date }}
                                                    </td>
                                                    <td>
                                                        {{ transaction.debit }}
                                                    </td>
                                                    <td>
                                                        {{ transaction.credit }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Customer</h5>
                                </div>

                                <div class="card-body">
                                    <div
                                        class="media align-items-center"
                                        href="javascript:"
                                    >
                                        <div class="avatar avatar-circle mr-3">
                                            <img
                                                class="avatar-img"
                                                onerror="this.src='https://6pos.6amtech.com/public/assets/admin/img/160x160/img1.jpg'"
                                                src="https://6pos.6amtech.com/storage/app/public/customer/2022-09-20-632992a3ca60b.png"
                                                alt="Image Description"
                                                height="50"
                                            />
                                        </div>
                                        <div class="media-body">
                                            <span
                                                class="text-body text-hover-primary"
                                                >{{ customer.name }}</span
                                            >
                                        </div>
                                    </div>
                                    <hr />
                                    <div
                                        class="media align-items-center"
                                        href="javascript:"
                                    >
                                        <i class="fas fa-shopping-bag mr-2"></i>
                                        <div class="media-body">
                                            <span
                                                class="text-body text-hover-primary"
                                                >2 Orders</span
                                            >
                                        </div>
                                    </div>
                                    <div
                                        class="media align-items-center mt-1"
                                        href="javascript:"
                                    >
                                        <i class="fas fa-plus-circle mr-2"></i>

                                        <div class="media-body">
                                            <span
                                                class="text-body text-hover-primary"
                                                >{{ customer.balance }} $</span
                                            >
                                        </div>
                                    </div>
                                    <hr />
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <h5>Contact info</h5>
                                    </div>
                                    <ul
                                        class="list-unstyled list-unstyled-py-2"
                                    >
                                        <li>
                                            <i class="fa fa-phone mr-2"></i>
                                            {{ customer.phone }}
                                        </li>
                                        <li>
                                            <i class="fa fa-at mr-2"></i>
                                            {{ customer.email }}
                                        </li>
                                    </ul>
                                    <hr />
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <h5>Addresses</h5>
                                    </div>
                                    <ul
                                        class="list-unstyled list-unstyled-py-2"
                                    >
                                        <li>State: {{ customer.state }}</li>
                                        <li>City: {{ customer.city }}</li>
                                        <li>
                                            Zip code: {{ customer.zipcode }}
                                        </li>
                                        <li>Address: {{ customer.address }}</li>
                                    </ul>
                                </div>
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
                                                orderItem.product.selling_price
                                            }}
                                            $ <br />
                                            Discount :
                                            {{
                                                orderItem.product.discount_type
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
                                        invoice.order_amount + invoice.total_tax
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
