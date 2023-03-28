<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { inject } from "vue";
import Pagination from "@/Shared/Pagination.vue";
defineProps({ products: Object, totalProducts: Number });
const toastr = useToastr();
const form = useForm({
    id: null,
    quantity: null,
});
function editQuantity(data) {
    form.id = data.id;
}
function updateQuantity() {
    form.post(route("product.quantity.update"), {
        onSuccess: () => {
            form.reset();
            $("#updateQuantity").modal("hide");
            toastr.success("Quantity Updated.");
        },
        onError: () => {
            toastr.error("Invalid Input.");
        },
    });
}
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
            form.post(route("product.delete", id));
            // toastr.success("Category Created.");
            Swal.fire("Deleted!", "Product has been deleted.", "success");
        }
    });
}
</script>

<template>
    <div class="card-body table-responsive p-0">
        <table
            class="table table-hover text-nowrap"
            v-if="products.data.length > 0"
        >
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th>
                    <th>PRODUCT CODE</th>
                    <th>PURCHASE PRICE</th>
                    <th>SELLING PRICE</th>
                    <th>QUANTITY</th>
                    <th>ORDERS</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="product in products.data"
                    :key="product.key"
                    v-if="products.data.length > 0"
                >
                    <td>{{ product.name }}</td>
                    <td>
                        <img
                            v-if="product.image"
                            :src="'../' + product.image"
                            width="50"
                            height="50"
                        />
                        <img
                            v-else
                            src="https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg"
                            alt="product image"
                            width="50"
                            height="50"
                        />
                    </td>

                    <td v-if="product.category != null">
                        {{ product.category.name }}
                    </td>
                    <td v-else></td>
                    <td>{{ product.code }}</td>
                    <td>
                        {{ product.purchase_price }}
                        $
                    </td>
                    <td>
                        {{ product.selling_price }}
                        $
                    </td>
                    <td>
                        {{ product.quantity }}
                        <i
                            type="button"
                            class="fas fa-plus-circle"
                            data-toggle="modal"
                            data-target="#updateQuantity"
                            @click="editQuantity(product)"
                        ></i>
                    </td>
                    <td>1</td>
                    <td align="center">
                        <Link
                            :href="route('product.edit', product.id)"
                            class="btn btn-sm btn-warning"
                            style="margin-right: 3px"
                        >
                            <i class="fas fa-edit"></i>
                        </Link>

                        <button
                            class="btn btn-sm btn-danger"
                            @click="deleteConfirm(product.id)"
                            style="margin-right: 3px"
                        >
                            <i class="fas fa-trash"></i>
                        </button>

                        <a
                            :href="
                                route('product.barcode.generate', product.id)
                            "
                            class="btn btn-sm btn-info"
                            target="_blank"
                        >
                            <i class="fas fa-barcode"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>IMAGE</th>
                        <th>CATEGORY</th>
                        <th>PRODUCT CODE</th>
                        <th>PURCHASE PRICE</th>
                        <th>SELLING PRICE</th>
                        <th>QUANTITY</th>
                        <th>ORDERS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
            </table>
            <div class="text-center p-4">
                <img
                    class="mb-3 img-two-plst"
                    src="https://6pos.6amtech.com/public/assets/admin/svg/illustrations/sorry.svg"
                    alt="Image Description"
                    width="100"
                    height="100"
                />
                <p class="mb-0">No data to show</p>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix" v-if="products.data.length > 10">
        <Pagination :links="products.links" />
    </div>
    <!-- Modal -->
    <div
        class="modal fade"
        id="updateQuantity"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Update Product Quantity
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
                    @submit.prevent="updateQuantity"
                    enctype="multipart/form-data"
                >
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" v-model="form.id" />
                                    <label for="">Quantity</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        v-model="form.quantity"
                                    />
                                    <small style="color: red">
                                        (To decrease product quantity use minus
                                        before number. Ex: -10 )
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button> -->
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
