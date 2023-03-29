<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { watch, ref, getCurrentInstance, onMounted } from "vue";
import axios from "axios";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    brands: Object,
    units: Object,
    categories: Object,
    product: Object,
});
const toastr = useToastr();
const form = useForm(props.product);

const seletedCategory = ref(props.product.category_id);
const subCategories = ref({});
watch(seletedCategory, (value) => {
    axios
        .post("/product/get-subcategories", { id: seletedCategory.value })
        .then((response) => {
            subCategories.value = response.data.data;
            form.category_id = response.data.data[0].category_id;
        });
    // form.category_id = selectedCategory.value;
});

onMounted(() => {
    imageUrl.value = "../../" + form.image;
    axios
        .post("/product/get-subcategories", { id: form.category_id })
        .then((response) => {
            subCategories.value = response.data.data;
            form.category_id = response.data.data[0].category_id;
        });
});

const deleteImage = ref(false);
const instance = getCurrentInstance();
const imageFile = ref();
const imageUrl = ref();
function handleImageSelected(e) {
    if (!e.target.files.length) return;
    imageFile.value = e.target.files[0];
    console.log(e.target.files[0]);
    let reader = new FileReader();
    reader.readAsDataURL(imageFile.value);
    reader.onload = (e) => {
        imageUrl.value = e.target.result;
    };
    deleteImage.value = true;
}
function resetImage() {
    instance.refs.file.value = null;
    imageFile.value = null;
    imageUrl.value = "../../" + props.product.image;
    form.image = null;
    // console.log(imageUrl.value);
    deleteImage.value = !deleteImage.value;
}

function generateCode() {
    let newCode = "";
    for (let i = 0; i < 6; i++) {
        newCode += Math.floor(Math.random() * 9) + 1;
    }
    form.code = newCode;
}

function submit() {
    form.post("/product/update", {
        preserveScroll: false,
        onSuccess: () => {
            form.reset();
            toastr.success("Product Updated.");
        },
        onError: () => {
            toastr.error("Invalid Input.");
        },
    });
}
</script>
<template>
    <Head title="Edit Product" />
    <main-layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Product</h1>
                        </div>
                        <!-- /.col -->
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
                                                        Name
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        id="name"
                                                        v-model="form.name"
                                                        class="form-control invalid"
                                                        placeholder="Product name"
                                                    />
                                                    <small
                                                        v-if="form.errors.name"
                                                        style="color: red"
                                                    >
                                                        {{ form.errors.name }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <div
                                                        class="row"
                                                        style="margin-left: 0px"
                                                    >
                                                        <label for="">
                                                            Product code SKU
                                                            <span
                                                                class="text-danger"
                                                                >*
                                                            </span>
                                                        </label>
                                                        <a
                                                            style="
                                                                position: absolute;
                                                                right: 10px;
                                                                top: 5px;
                                                                color: blue;
                                                            "
                                                            type="button"
                                                            @click="
                                                                generateCode
                                                            "
                                                            >Generate code</a
                                                        >
                                                    </div>

                                                    <input
                                                        type="number"
                                                        name="code"
                                                        id="code"
                                                        v-model="form.code"
                                                        class="form-control"
                                                        placeholder="Product code"
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
                                                        Brand
                                                    </label>
                                                    <select
                                                        name="brand_id"
                                                        class="form-control"
                                                        id="brand_id"
                                                        v-model="form.brand_id"
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option
                                                            v-for="brand in brands"
                                                            :key="brand.id"
                                                            :value="brand.id"
                                                        >
                                                            {{ brand.name }}
                                                        </option>
                                                    </select>
                                                    <small
                                                        v-if="
                                                            form.errors.brand_id
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors.brand_id
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Quantity
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        v-model="form.quantity"
                                                        class="form-control"
                                                        placeholder="Quantity"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors.quantity
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors.quantity
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Unit type
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span>
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        v-model="form.unit_id"
                                                        id=""
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option
                                                            v-for="unit in units"
                                                            :key="unit.id"
                                                            :value="unit.id"
                                                        >
                                                            {{ unit.name }}
                                                        </option>
                                                    </select>
                                                    <small
                                                        v-if="
                                                            form.errors.unit_id
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors.unit_id
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Unit Value
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        v-model="
                                                            form.unit_value
                                                        "
                                                        class="form-control"
                                                        placeholder="Unit value"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors.unit_id
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors.unit_id
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Category
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span>
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                        v-model="
                                                            seletedCategory
                                                        "
                                                    >
                                                        <option
                                                            value=""
                                                            selected
                                                        >
                                                            --Select--
                                                        </option>
                                                        <option
                                                            v-for="category in categories"
                                                            :key="category.id"
                                                            :value="category.id"
                                                        >
                                                            {{ category.name }}
                                                        </option>
                                                    </select>
                                                    <small
                                                        v-if="
                                                            form.errors
                                                                .category_id
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors
                                                                .category_id
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Sub Category
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                        v-model="
                                                            form.subcategory_id
                                                        "
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option
                                                            v-for="subCategory in subCategories"
                                                            v-if="subCategories"
                                                            :key="
                                                                subCategory.id
                                                            "
                                                            :value="
                                                                subCategory.id
                                                            "
                                                        >
                                                            {{
                                                                subCategory.name
                                                            }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Selling Price
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        v-model="
                                                            form.selling_price
                                                        "
                                                        class="form-control"
                                                        placeholder="Selling Price"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors
                                                                .selling_price
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors
                                                                .selling_price
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Purchase price
                                                        <span
                                                            class="text-danger"
                                                            >*
                                                        </span></label
                                                    >
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        v-model="
                                                            form.purchase_price
                                                        "
                                                        class="form-control"
                                                        placeholder="Purchase price"
                                                    />
                                                    <small
                                                        v-if="
                                                            form.errors
                                                                .purchase_price
                                                        "
                                                        style="color: red"
                                                    >
                                                        {{
                                                            form.errors
                                                                .purchase_price
                                                        }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount type
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        v-model="
                                                            form.discount_type
                                                        "
                                                    >
                                                        <option
                                                            value="1"
                                                            selected
                                                        >
                                                            Percent
                                                        </option>
                                                        <option value="0">
                                                            Amount
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Discount percent (%)
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="name"
                                                        v-model="
                                                            form.discount_value
                                                        "
                                                        class="form-control"
                                                        placeholder="Discount"
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
                                                        Tax in percent (%)
                                                    </label>
                                                    <input
                                                        type="number"
                                                        name="tax"
                                                        v-model="form.tax"
                                                        class="form-control"
                                                        placeholder="Tax"
                                                    />
                                                    <small
                                                        v-if="form.errors.tax"
                                                        style="color: red"
                                                    >
                                                        {{ form.errors.tax }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-6 col-md-6 col-lg-6"
                                            >
                                                <div class="form-group">
                                                    <label for="">
                                                        Select supplier
                                                    </label>
                                                    <select
                                                        name=""
                                                        class="form-control"
                                                        id=""
                                                        v-model="
                                                            form.supplier_id
                                                        "
                                                    >
                                                        <option value="">
                                                            --Select--
                                                        </option>
                                                        <option value="1">
                                                            Keysan
                                                            (0822481210240)
                                                        </option>
                                                        <option value="2">
                                                            Adelar
                                                            (0856518182619)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="col-12 col-sm-12 col-md-12 col-lg-12"
                                            >
                                                <label>Image</label
                                                ><small class="text-danger"
                                                    >* ( Ratio 1:1 )</small
                                                >
                                                <input
                                                    type="file"
                                                    class="form-control"
                                                    @input="
                                                        form.image =
                                                            $event.target.files[0]
                                                    "
                                                    @change="
                                                        handleImageSelected
                                                    "
                                                    ref="file"
                                                    accept="image/*"
                                                />
                                                <small
                                                    v-if="form.errors.image"
                                                    style="color: red"
                                                >
                                                    {{ form.errors.image }}
                                                </small>
                                            </div>
                                            <div class="col-12 from_part_2">
                                                <div class="form-group">
                                                    <center>
                                                        <!-- <ImagePreview /> -->
                                                        <img
                                                            v-if="imageUrl"
                                                            width="300"
                                                            class="mt-2"
                                                            height="250"
                                                            :src="imageUrl"
                                                            alt="Image"
                                                        />
                                                        <img
                                                            v-else
                                                            class="mt-2"
                                                            width="300"
                                                            height="250"
                                                            src="https://6pos.6amtech.com/public/assets/admin/img/400x400/img2.jpg"
                                                            alt="Image"
                                                        />
                                                        <div>
                                                            <p
                                                                v-if="
                                                                    deleteImage
                                                                "
                                                                style="
                                                                    color: blue;
                                                                    text-decoration: underline;
                                                                "
                                                                type="button"
                                                                @click="
                                                                    resetImage
                                                                "
                                                            >
                                                                Reset
                                                            </p>
                                                        </div>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update
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
