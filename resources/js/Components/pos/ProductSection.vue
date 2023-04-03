<script setup>
import { useForm, Link, router } from "@inertiajs/vue3";
import { useToastr } from "@/toastr.js";
import { ref, watch } from "vue";

const props = defineProps({ products: Object, categories: Object });

const toastr = useToastr();
const form = useForm({});
const enteredProduct = ref(null);
function addToCart(code) {
    form.post(route("pos.addtocart", code));
    toastr.success("Item has been added in your cart");
}
let category = ref("");

watch(category, (value) => {
    router.get(
        "/pos",
        { category: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

watch(enteredProduct, (value) => {
    if (value) {
        if (value.length >= 6) {
            fetch(`/pos/check-product/${value}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.code) {
                        addToCart(data.code);
                        enteredProduct.value = null;
                    }
                    // console.log(data.code); // Do something with the order data
                    // addToCart(data.code);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }
});
</script>

<template>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title m-0">Product Section</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" v-model="category">
                        <option value="" :selected="category">
                            All Categories
                        </option>
                        <option
                            :value="category.id"
                            v-for="category in categories"
                            :key="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input
                            type="text"
                            name="table_search"
                            v-model="enteredProduct"
                            class="form-control float-right"
                            placeholder="Scan product barcode or enter product code here"
                            autocomplete="off"
                            autofocus
                            max="6"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="fas fa-barcode"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="container-fluid">
                <div class="pos-item-wrap">
                    <div
                        id="39"
                        class=""
                        v-for="product in products"
                        :key="product.id"
                        @click="addToCart(product.code)"
                        type="button"
                    >
                        <input
                            type="hidden"
                            id="product_id"
                            name="id"
                            value="39"
                        />
                        <input
                            type="hidden"
                            id="product_qty"
                            name="quantity"
                            value="1"
                        />
                        <a class="pos-product-item card">
                            <div class="pos-product-item_thumb">
                                <img
                                    v-if="product.image"
                                    :src="'../' + product.image"
                                    class="img-fit"
                                />
                                <img
                                    v-else
                                    src="https://6pos.6amtech.com/public/assets/admin/img/160x160/img2.jpg"
                                    alt="product image"
                                    class="img-fit"
                                />
                            </div>
                            <div class="pos-product-item_content">
                                <div class="pos-product-item_title">
                                    {{ product.name }}
                                </div>
                                <div class="pos-product-item_price">
                                    <div v-if="product.discount_value">
                                        <p
                                            style="display: inline"
                                            v-if="product.discount_type"
                                        >
                                            {{
                                                product.selling_price -
                                                product.selling_price *
                                                    (product.discount_value /
                                                        100)
                                            }}
                                            $
                                        </p>
                                        <p style="display: inline" v-else>
                                            {{
                                                product.selling_price -
                                                product.discount_value
                                            }}
                                            $
                                        </p>

                                        <p
                                            class="text-muted discount-text"
                                            v-if="product.discount_value"
                                        >
                                            {{ product.selling_price }} $
                                        </p>
                                    </div>
                                    <div v-else>
                                        <p style="display: inline">
                                            {{ product.selling_price }} $
                                        </p>
                                    </div>

                                    <br />
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.discount-text {
    text-decoration: line-through;
    display: inline;
}
.pos-item-wrap {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 15px;
    max-block-size: 61vh;
    overflow-y: auto;
    padding-bottom: 2px;
}
.pos-product-item_thumb {
    height: 152px;
    padding: 10px;
}
.pos-product-item_content {
    text-align: center;
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    flex-grow: 1;
}
.img-fit {
    max-height: 100%;
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}
.pos-product-item_title {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    color: #1e2022;
    margin-bottom: 5px;
}
.pos-product-item_price {
    font-weight: 700;
    color: #1e2022;
}
</style>
