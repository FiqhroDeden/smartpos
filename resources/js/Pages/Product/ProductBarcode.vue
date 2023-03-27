<script setup>
import { Head, useForm } from "@inertiajs/vue3";

import { ref, onMounted } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    product: Object,
    barcode: String,
});

const counter = ref(9);
const barcodeCount = ref(9);
const form = useForm(props.product);

function generateBarcode() {
    counter.value = barcodeCount.value;
}
function reset() {
    counter.value = 9;
    barcodeCount.value = 9;
}
function print() {
    const printArea = document.getElementById("printarea");
    const printContent = printArea.innerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
onMounted(() => {
    window.addEventListener("afterprint", () => {
        console.log("mounted");
        location.reload();
    });
});
</script>
<template>
    <Head :title="form.name" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <!-- <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Generate Product Barcode</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">
                                    Edit Product
                                </li>
                            </ol>
                        </div>
                    </div> -->
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
                                <div class="card-body table-responsive p-0">
                                    <table
                                        class="table table-hover text-nowrap"
                                    >
                                        <thead>
                                            <tr>
                                                <th>CODE</th>
                                                <th>NAME</th>
                                                <th>QUANTITY</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ form.code }}
                                                </td>
                                                <td>
                                                    {{ form.name }}
                                                </td>
                                                <td>
                                                    <input
                                                        type="number"
                                                        v-model="barcodeCount"
                                                        class="form-control col-md-6 col-12"
                                                        min="1"
                                                    />
                                                </td>
                                                <td>
                                                    <button
                                                        class="btn btn-primary mr-2"
                                                        @click="generateBarcode"
                                                    >
                                                        Generate Barcode
                                                    </button>
                                                    <button
                                                        class="btn btn-danger mr-2"
                                                        @click="reset"
                                                    >
                                                        Reset
                                                    </button>
                                                    <button
                                                        class="btn btn-info mr-2"
                                                        @click="print"
                                                    >
                                                        Print
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="printarea" class="show-div">
                            <div class="barcodea4">
                                <div
                                    class="item style24"
                                    v-for="i in counter"
                                    :key="i"
                                >
                                    <span class="barcode_site text-capitalize"
                                        >Smart Pos</span
                                    >
                                    <span
                                        class="barcode_name text-capitalize"
                                        >{{ form.name }}</span
                                    >
                                    <span class="barcode_price text-capitalize">
                                        {{ form.selling_price }} $
                                    </span>
                                    <span class="barcode_image">
                                        <div
                                            v-html="barcode"
                                            align="center"
                                        ></div>
                                    </span>
                                    <!-- <span class="barcode_code text-capitalize"
                                        >Code : {{ form.code }}</span
                                    > -->
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
<style scoped>
.show-div {
    margin: auto;
    width: 60%;
}
.barcodea4 {
    width: 8.25in;
    height: 13in;
    display: block;
    border: 1px solid #ccc;
    margin: 10px auto;
    padding: 0.1in 0 0 0.1in;
    page-break-after: always;
}
.barcodea4 .item {
    display: block;
    overflow: hidden;
    text-align: center;
    border: 1px dotted #ccc;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    float: left;
    margin-right: 5px;
    margin-bottom: 8px;
}
.barcodea4 .style24 {
    width: 2.48in;
    height: 1.335in;
    margin-left: 0.079in;
    padding-top: 0.05in;
}
.text-capitalize {
    text-transform: capitalize !important;
}
.barcode_site {
    font-size: 14px;
    display: block;
    font-weight: bold;
}
.barcode_name {
    display: block;
}
.barcode_price {
    display: block;
}
.barcode_image {
    display: block;
}
.barcode_code {
    display: block;
    font-weight: bold;
}
</style>
