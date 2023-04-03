<script setup>
import { Head } from "@inertiajs/vue3";
import ProductSection from "@/Components/pos/ProductSection.vue";
import BillingSection from "@/Components/pos/BillingSection.vue";
const props = defineProps({
    categories: Object,
    products: Object,
    carts: Object,
    active_cart: Object,
    cart_items: Object,
    last_order: Object,
});
</script>

<template>
    <Head title="POS" />
    <div class="">
        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand-md navbar-light navbar-white"
        >
            <div class="container">
                <a :href="route('dashboard')" class="brand-link">
                    <img
                        src="/assets/dist/img/AdminLTELogo.png"
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: 0.8"
                    />
                    <h3 style="color: black">SMART POS</h3>
                </a>

                <button
                    class="navbar-toggler order-1"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse order-3"
                    id="navbarCollapse"
                ></div>

                <!-- Right navbar links -->
                <ul
                    class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto"
                ></ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- <div class="container"></div> -->
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <ProductSection
                                :products="products"
                                :categories="categories"
                            />

                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-4">
                            <BillingSection
                                :carts="carts"
                                :cart_items="cart_items"
                                :active_cart="active_cart"
                                :last_order="last_order"
                            />
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
</template>
<style scoped></style>
