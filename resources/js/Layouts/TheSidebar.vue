<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img
                src="/assets/dist/img/AdminLTELogo.png"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: 0.8"
            />
            <span class="brand-text font-weight-light">SMART POS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="/assets/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-header">DASHBOARD SECTION</li>
                    <li class="nav-item">
                        <Link
                            :href="route('dashboard')"
                            class="nav-link"
                            :class="
                                route().current('dashboard') ? 'active' : ''
                            "
                        >
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </Link>
                    </li>
                    <li class="nav-header">POS SECTION</li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('pos')
                                ? 'menu-open'
                                : route().current('pos.orders')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                POS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('pos')"
                                    class="nav-link"
                                    :class="
                                        route().current('pos') ? 'active' : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pos</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('pos.orders')"
                                    class="nav-link"
                                    :class="
                                        route().current('pos.orders')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Orders
                                        <span class="right badge badge-info"
                                            >23</span
                                        >
                                    </p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">PRODUCT SECTION</li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('category.list')
                                ? 'menu-open'
                                : route().current('category.subCategory')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Category
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('category.list')"
                                    class="nav-link"
                                    :class="
                                        route().current('category.list')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('category.subCategory')"
                                    class="nav-link"
                                    :class="
                                        route().current('category.subCategory')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sub Category</p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <Link
                            :href="route('brand.list')"
                            class="nav-link"
                            :class="
                                route().current('brand.list') ? 'active' : ''
                            "
                        >
                            <i class="nav-icon fas fa-star"></i>
                            <p>Brand</p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            :href="route('unit.add')"
                            class="nav-link"
                            :class="route().current('unit.add') ? 'active' : ''"
                        >
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Unit</p>
                        </Link>
                    </li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('product.add')
                                ? 'menu-open'
                                : route().current('product.list')
                                ? 'menu-open'
                                : route().current('product.bulkImport')
                                ? 'menu-open'
                                : route().current('product.bulkExport')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Product
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('product.add')"
                                    class="nav-link"
                                    :class="
                                        route().current('product.add')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('product.list')"
                                    class="nav-link"
                                    :class="
                                        route().current('product.list')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('product.bulkImport')"
                                    class="nav-link"
                                    :class="
                                        route().current('product.bulkImport')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bulk Import</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="#"
                                    class="nav-link"
                                    :class="
                                        route().current('product.bulkExport')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bulk Export</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <Link
                            :href="route('stock.limit')"
                            class="nav-link"
                            :class="
                                route().current('stock.limit') ? 'active' : ''
                            "
                        >
                            <i class="nav-icon fas fa-exclamation-triangle"></i>
                            <p>Stock Limit Products</p>
                        </Link>
                    </li>
                    <li class="nav-header">BUSINESS SECTION</li>
                    <li class="nav-item">
                        <Link
                            :href="route('coupon.add')"
                            class="nav-link"
                            :class="
                                route().current('coupon.add') ? 'active' : ''
                            "
                        >
                            <i class="nav-icon fas fa-gift"></i>
                            <p>Coupons</p>
                        </Link>
                    </li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('account.add')
                                ? 'menu-open'
                                : route().current('account.list')
                                ? 'menu-open'
                                : route().current('account.addExpense')
                                ? 'menu-open'
                                : route().current('account.addIncome')
                                ? 'menu-open'
                                : route().current('account.addTransfer')
                                ? 'menu-open'
                                : route().current('account.listTransaction')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-credit-card"></i>
                            <p>
                                Account Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('account.add')"
                                    class="nav-link"
                                    :class="
                                        route().current('account.add')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Account</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('account.list')"
                                    class="nav-link"
                                    :class="
                                        route().current('account.list')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Accounts</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('account.addExpense')"
                                    class="nav-link"
                                    :class="
                                        route().current('account.addExpense')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Expense</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('account.addIncome')"
                                    class="nav-link"
                                    :class="
                                        route().current('account.addIncome')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Income</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('account.addTransfer')"
                                    class="nav-link"
                                    :class="
                                        route().current('account.addTransfer')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Transfer</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('account.listTransaction')"
                                    class="nav-link"
                                    :class="
                                        route().current(
                                            'account.listTransaction'
                                        )
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Transaction List</p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">CUSTOMER SECTION</li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('customer.add')
                                ? 'menu-open'
                                : route().current('customer.list')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Customer
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('customer.add')"
                                    class="nav-link"
                                    :class="
                                        route().current('customer.add')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Customer</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('customer.list')"
                                    class="nav-link"
                                    :class="
                                        route().current('customer.list')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer List</p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">SUPPIER SECTION</li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('supplier.add')
                                ? 'menu-open'
                                : route().current('supplier.list')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Supplier
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('supplier.add')"
                                    class="nav-link"
                                    :class="
                                        route().current('supplier.add')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Suplier</p>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link
                                    :href="route('supplier.list')"
                                    class="nav-link"
                                    :class="
                                        route().current('supplier.list')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suplier List</p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">SHOP SETTING SECTION</li>
                    <li
                        class="nav-item"
                        :class="
                            route().current('business.setting')
                                ? 'menu-open'
                                : ''
                        "
                    >
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <Link
                                    :href="route('business.setting')"
                                    class="nav-link"
                                    :class="
                                        route().current('business.setting')
                                            ? 'active'
                                            : ''
                                    "
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shop Setup</p>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <br /><br />
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
