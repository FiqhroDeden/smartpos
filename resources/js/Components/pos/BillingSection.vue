<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import {
    reactive,
    computed,
    ref,
    watch,
    inject,
    getCurrentInstance,
} from "vue";

const props = defineProps({
    carts: Object,
    active_cart: Object,
    cart_items: Object,
});
const toastr = useToastr();
const form = useForm({
    id: null,
    quantity: null,
    product_id: null,
});

const subTotal = computed(() => {
    let sum = 0;
    props.cart_items.forEach((item) => {
        sum += item.product.selling_price * item.quantity;
        // console.log(sum);
    });
    return sum;
});

const ProductDiscount = computed(() => {
    let sum = 0;
    props.cart_items.forEach((item) => {
        if (item.product.discount_value) {
            if (item.product.discount_type) {
                sum +=
                    (item.product.selling_price -
                        (item.product.selling_price -
                            item.product.selling_price *
                                (item.product.discount_value / 100))) *
                    item.quantity;
            } else {
                sum += item.product.discount_value * item.quantity;
            }
        }
    });
    return sum;
});
const totalTax = computed(() => {
    let sum = 0;
    props.cart_items.forEach((item) => {
        if (item.product.tax) {
            sum +=
                ((item.product.selling_price * item.product.tax) / 100) *
                item.quantity;
        }
    });
    return sum;
});
const total = computed(() => {
    return subTotal.value - ProductDiscount.value;
});
const grandTotal = computed(() => {
    return total.value + totalTax.value;
});
const collectedCash = ref(null);
const returnedAmount = computed(() => {
    if (collectedCash.value !== null) {
        return collectedCash.value - grandTotal.value;
    } else {
        return null;
    }
});

function deleteItem(id) {
    form.post(route("pos.delete.item", id));
    toastr.info("Item has been removed in your cart.");
}

function editQuantity(id, quantity, product_id) {
    form.id = id;
    form.quantity = quantity;
    form.product_id = product_id;
    updateQuantity();
}

function updateQuantity() {
    form.post("/pos/update-quantity", {
        preserveScroll: false,
        onError: () => {
            toastr.warning("Product quantity can be zero or less");
        },
    });
}

function newOrder() {
    router.get("/pos/neworder", {
        preserveState: true,
        replace: true,
    });
}

let activeCart = ref(props.active_cart.id);
function cartChange(id) {
    activeCart.value = id;
    submitForm.cart_id = id;
}
watch(activeCart, (value) => {
    router.get(
        "/pos/changecart",
        { id: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

function clearCart() {
    router.post("/pos/clearcart", {
        preserveState: true,
        replace: true,
    });
}

function selectCustomer(value) {
    router.post(
        "/pos/selectcustomer",
        { id: value },
        {
            preserveState: true,
            replace: true,
        }
    );
}
const Swal = inject("$swal");
function cancelOrder(value) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to remove all items from cart!!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            router.post(
                "/pos/cancelorder",
                { id: value },
                {
                    preserveState: true,
                    replace: true,
                }
            );
            toastr.info("Item has been removed from cart");
            // Swal.fire("Deleted!", "Product has been deleted.", "success");
        }
    });
}

// const currentCustomer = ref(props.active_cart.customer_id);
// watch(currentCustomer, (newVal) => {
//     console.log(currentCustomer);
//     currentCustomer.value = newVal;
// });
const submitForm = useForm({
    customer_id: props.active_cart.customer_id,
    payment_method: "Cash",
    order_amount: total,
    total_tax: totalTax,
    extra_discount: null,
    coupon_discount: null,
    paid_amount: grandTotal,
    collected_amount: collectedCash,
    cart_id: props.active_cart.id,
});

function submitOrder() {
    submitForm.post("/pos/submit-order", {
        preserveScroll: false,
        onSuccess: () => {
            // submitForm.reset();
            collectedCash.value = null;
            submitForm.collected_amount = null;
            $("#paymentModal").modal("hide");
            toastr.success("Order Placed Successfully.");
            // instance.refs.file.value = null;
        },
        onError: () => {
            toastr.error("Invalid Input.");
        },
    });
}
</script>

<template>
    <div class="card billing-section-wrap">
        <h5 class="p-3 m-0 bg-light">Billing Section</h5>
        <div class="">
            <div class="card-body pb-0">
                <div
                    class="d-flex align-items-center gap-2 mb-3"
                    data-select2-id="19"
                >
                    <div class="flex-grow-1">
                        <select
                            id="customer"
                            name="customer_id"
                            v-model="submitForm.customer_id"
                            class="form-control js-data-example-ajax select2-hidden-accessible"
                            @change="selectCustomer($event.target.value)"
                            data-select2-id="customer"
                            tabindex="-1"
                            aria-hidden="true"
                        >
                            <option value="1">Walking customer</option>
                            <option value="2">Keysan</option>
                            <option value="3">Adelar</option>
                        </select>
                    </div>
                    <div class="ml-2">
                        <button
                            class="w-i6 d-inline-block btn btn-success rounded text-nowrap"
                            id="add_new_customer"
                            type="button"
                            data-toggle="modal"
                            data-target="#add-customer"
                            title="Add Customer"
                        >
                            <i class="tio-add"></i>
                            Customer
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="input-label text-capitalize">
                        Current customer :
                        <span class="style-i4" id="current_customer">{{
                            active_cart.customer_id
                        }}</span>
                    </label>
                </div>
                <div class="d-flex gap-2 flex-wrap align-items-center mb-3">
                    <div class="flex-grow-1">
                        <select
                            id="cart_id"
                            name="cart_id"
                            class="form-control js-select2-custom select2-hidden-accessible"
                            @change="cartChange($event.target.value)"
                            data-select2-id="cart_id"
                            tabindex="-1"
                            aria-hidden="true"
                        >
                            <option
                                :value="cart.id"
                                v-for="cart in carts"
                                :key="cart.id"
                                :selected="cart.active"
                            >
                                {{ cart.code }}
                            </option>
                        </select>
                    </div>
                    <div class="ml-2">
                        <a
                            type="button"
                            class="w-i6 d-inline-block btn btn-danger rounded"
                            @click="clearCart()"
                        >
                            Clear cart
                        </a>
                    </div>
                    <div class="ml-2">
                        <a
                            type="button"
                            class="w-i6 d-inline-block btn btn-success rounded"
                            @click="newOrder"
                        >
                            New order
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <div id="cartloader" class="d-none">
                        <img
                            width="50"
                            src="https://6pos.6amtech.com/public/assets/admin/img/loader.gif"
                        />
                    </div>
                </center>
            </div>
        </div>
        <div id="cart">
            <div class="card-body pt-0">
                <div class="table-responsive pos-cart-table border">
                    <table class="table table-align-middle mb-0">
                        <thead class="text-muted">
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="cart_item in cart_items"
                                :key="cart_item.id"
                            >
                                <td class="media gap-2 align-items-center">
                                    <img
                                        v-if="cart_item.product.image"
                                        :src="'../' + cart_item.product.image"
                                        class="avatar avatar-sm mr-2"
                                    />
                                    <img
                                        v-else
                                        src="https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg"
                                        alt="product image"
                                        class="avatar avatar-sm mr-2"
                                    />
                                    <div class="media-body">
                                        <h6 class="text-hover-primary mb-0">
                                            {{ cart_item.product.name }}
                                        </h6>
                                    </div>
                                </td>
                                <td>
                                    <input
                                        type="number"
                                        data-key="0"
                                        class="form-control text-center qty-width"
                                        :value="cart_item.quantity"
                                        min="1"
                                        @keyup="
                                            editQuantity(
                                                cart_item.id,
                                                $event.target.value,
                                                cart_item.product.id
                                            )
                                        "
                                    />
                                </td>
                                <td>
                                    <div>
                                        {{
                                            cart_item.product.selling_price *
                                            cart_item.quantity
                                        }}
                                        $
                                    </div>
                                </td>
                                <td>
                                    <a
                                        type="button"
                                        class="btn btn-sm btn-outline-danger square-btn"
                                        @click="deleteItem(cart_item.id)"
                                    >
                                        <i class="fas fa-trash"></i
                                    ></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box p-3">
                <dl class="row">
                    <dt class="col-6">Sub total :</dt>
                    <dd class="col-6 text-right">{{ subTotal }} $</dd>

                    <dt class="col-6">Product discount :</dt>
                    <dd class="col-6 text-right">{{ ProductDiscount }} $</dd>

                    <dt class="col-6">Extra discount :</dt>
                    <dd class="col-6 text-right">
                        <button
                            id="extra_discount"
                            class="btn btn-sm"
                            type="button"
                            data-toggle="modal"
                            data-target="#add-discount"
                        >
                            <i class="tio-edit"></i></button
                        >0.00 $
                    </dd>
                    <dt class="col-6">Coupon discount :</dt>
                    <dd class="col-6 text-right">
                        <button
                            id="coupon_discount"
                            class="btn btn-sm"
                            type="button"
                            data-toggle="modal"
                            data-target="#add-coupon-discount"
                        >
                            <i class="tio-edit"></i></button
                        >0 $
                    </dd>

                    <dt class="col-6">Tax :</dt>
                    <dd class="col-6 text-right">{{ totalTax }} $</dd>

                    <dt class="col-6">Total :</dt>
                    <dd class="col-6 text-right h4 b">
                        <span id="total_price">{{ grandTotal }}</span>
                        $
                    </dd>
                </dl>
                <div class="row g-2">
                    <div class="col-6 mt-2">
                        <a
                            href="#"
                            class="btn btn-danger btn-block"
                            @click="cancelOrder(active_cart.id)"
                        >
                            <i class="fa fa-times-circle"></i>
                            Cancel Order
                        </a>
                    </div>
                    <div class="col-6 mt-2">
                        <button
                            data-toggle="modal"
                            data-target="#paymentModal"
                            type="button"
                            class="btn btn-success btn-block"
                        >
                            <i class="fa fa-shopping-bag"></i>
                            Place Order
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-customer" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new customer</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="https://6pos.6amtech.com/admin/customer/store"
                                method="post"
                                id="product_form"
                            >
                                <input
                                    type="hidden"
                                    name="_token"
                                    value="Fd4yQfKj0NLKN07NQdQ2pTHzmtwrAmyRjRcY5alf"
                                />
                                <input
                                    type="hidden"
                                    class="form-control"
                                    name="balance"
                                    value="0"
                                />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >Customer name
                                                <span
                                                    class="input-label-secondary text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                value=""
                                                placeholder="Customer name"
                                                required=""
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >Mobile no
                                                <span
                                                    class="input-label-secondary text-danger"
                                                    >*</span
                                                ></label
                                            >
                                            <input
                                                type="number"
                                                id="mobile"
                                                name="mobile"
                                                class="form-control"
                                                value=""
                                                placeholder="Mobile no"
                                                required=""
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                value=""
                                                placeholder="Ex : ex@example.com"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >State</label
                                            >
                                            <input
                                                type="text"
                                                name="state"
                                                class="form-control"
                                                value=""
                                                placeholder="State"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >City
                                            </label>
                                            <input
                                                type="text"
                                                name="city"
                                                class="form-control"
                                                value=""
                                                placeholder="City"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >Zip code
                                            </label>
                                            <input
                                                type="text"
                                                name="zip_code"
                                                class="form-control"
                                                value=""
                                                placeholder="Zip code"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="input-label"
                                                >Address
                                            </label>
                                            <input
                                                type="text"
                                                name="address"
                                                class="form-control"
                                                value=""
                                                placeholder="Address"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button
                                        type="submit"
                                        id="submit_new_customer"
                                        class="btn btn-primary"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-discount" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Extra discount</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Discount</label>
                                    <input
                                        type="number"
                                        id="dis_amount"
                                        class="form-control"
                                        name="discount"
                                        step="0.01"
                                        min="0"
                                    />
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="">Type</label>
                                    <select
                                        name="type"
                                        id="type_ext_dis"
                                        class="form-control"
                                        onchange="limit(this);"
                                    >
                                        <option value="amount" selected="">
                                            Amount ($)
                                        </option>
                                        <option value="percent">
                                            Percent (%)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button
                                    class="btn btn-sm btn-primary"
                                    onclick="extra_discount();"
                                    type="submit"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-coupon-discount" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Coupon discount</h5>
                            <button
                                id="coupon_close"
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input
                                    type="text"
                                    id="coupon_code"
                                    class="form-control"
                                    name="coupon_code"
                                />
                            </div>

                            <div class="d-flex justify-content-end">
                                <button
                                    class="btn btn-sm btn-primary"
                                    type="submit"
                                    onclick="coupon_discount();"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add-tax" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update tax</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form
                                action="https://6pos.6amtech.com/admin/pos/tax"
                                method="POST"
                                class="row"
                            >
                                <input
                                    type="hidden"
                                    name="_token"
                                    value="Fd4yQfKj0NLKN07NQdQ2pTHzmtwrAmyRjRcY5alf"
                                />
                                <div class="form-group col-12">
                                    <label for="">Tax (%)</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="tax"
                                        min="0"
                                    />
                                </div>

                                <div class="form-group col-sm-12">
                                    <button
                                        class="btn btn-sm btn-primary"
                                        type="submit"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="modal fade"
                id="paymentModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Payment
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
                        <div class="modal-body">
                            <form
                                @submit.prevent="submitOrder"
                                enctype="multipart/form-data"
                            >
                                <div align="right">
                                    <h4>
                                        Total : <b>{{ grandTotal }} $ </b>
                                    </h4>
                                </div>
                                <div class="form-group">
                                    <label class="input-label" for=""
                                        >Type</label
                                    >
                                    <select
                                        onchange="payment_option(this);"
                                        name="type"
                                        id="payment_opp"
                                        class="form-control select2"
                                        required=""
                                    >
                                        <option value="1">Cash</option>
                                        <option value="4">
                                            Standard Chartered
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group" id="collected_cash">
                                    <label class="input-label" for=""
                                        >Collected cash ($)</label
                                    >
                                    <input
                                        type="number"
                                        id="cash_amount"
                                        v-model.number="collectedCash"
                                        class="form-control"
                                        :min="grandTotal"
                                        required
                                    />
                                </div>
                                <div align="right">
                                    <h5 v-if="returnedAmount !== null">
                                        Returned amount:
                                        <b>{{ returnedAmount }} $</b>
                                    </h5>
                                </div>
                                <hr v-if="returnedAmount !== null" />
                                <div class="d-flex justify-content-end">
                                    <button
                                        class="btn btn-primary"
                                        id="order_complete"
                                        type="submit"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="short-cut-keys" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Short cut keys</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span>To click order : alt + O</span><br />
                            <span>To click payment submit : alt + S</span><br />
                            <span>To close payment submit : alt + Z</span><br />
                            <span>To click cancel cart item all : alt + C</span
                            ><br />
                            <span>To click add new customer : alt + A</span>
                            <br />
                            <span
                                >To submit add new customer form : alt + N</span
                            ><br />
                            <span>To click short cut keys : alt + K</span><br />
                            <span>To print invoice : alt + P</span>
                            <br />
                            <span>To cancel invoice : alt + B</span>
                            <br />
                            <span>To focus search input : alt + Q</span>
                            <br />
                            <span>To click extra discount : alt + E</span>
                            <br />
                            <span>To click coupon discount : alt + D</span>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.media-body {
    -ms-flex: 1;
    flex: 1;
}
.avatar-sm {
    width: 2.1875rem;
    height: 2.1875rem;
}
.avatar {
    position: relative;
    display: inline-block;
    width: 2.625rem;
    height: 2.625rem;
    border-radius: 0.3125rem;
}
img {
    vertical-align: middle;
    border-style: none;
}
.qty-width {
    width: 50px !important;
}
.billing-section-wrap {
    max-height: calc(100vh - 134px);
    overflow-y: auto;
    overflow-x: hidden;
}
</style>
