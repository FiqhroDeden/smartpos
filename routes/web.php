<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Business\AccountController;
use App\Http\Controllers\Business\CouponController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\StockController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Models\Order;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function (){
        return Inertia::render('Dashboard');
    });
    Route::get('/dashboard', function (){
        return Inertia::render('Dashboard');
    })->name('dashboard');
    

    
    
    Route::controller(PosController::class)->group(function (){
        Route::get('/pos', 'index')->name('pos');
        Route::get('/pos/orders', 'orders')->name('pos.orders');
        Route::post('/pos/addtocart/{id}', 'addToCart')->name('pos.addtocart');
        Route::post('/pos/deleteitem/{id}', 'deleteItem')->name('pos.delete.item');
        Route::post('/pos/update-quantity', 'updateQuantity')->name('pos.update.quantity');
        Route::get('/pos/neworder', 'newOrder')->name('pos.neworder');
        Route::get('/pos/changecart', 'changeCart')->name('pos.change.cart');
        Route::post('/pos/clearcart', 'clearCart')->name('pos.clear.cart');
        Route::post('/pos/selectcustomer', 'selectCustomer')->name('pos.select.customer');
        Route::post('/pos/cancelorder', 'cancelOrder')->name('pos.cancel.order');
        Route::post('/pos/submit-order', 'submitOrder')->name('pos.submit.order');
        Route::get('/pos/last-order', function(){
            $lastOrder = Order::latest()->with('orderItems.product')->first();
            return response()->json($lastOrder);
        });
        Route::get("/pos/check-product/{code}", 'checkProduct')->name('pos.check.product');
    });
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/category/list', 'index')->name('category.list');
        Route::get('/category/sub-category', 'subCategory')->name('category.subCategory');
        Route::post('/category/store', 'store')->name('category.store');
        Route::post('/category/sub-category/store', 'subCategoryStore')->name('category.subCategory.store');
        Route::post('/category/update', 'update')->name('category.update');
        Route::post('/category/sub-category/update', 'subCategoryUpdate')->name('category.subCategory.update');
        Route::post('/category/update-status/{id}', 'updateStatus')->name('category.status.update');
        Route::post('/category/delete/{id}', 'delete')->name('category.delete');
        Route::post('/category/sub-category/delete/{id}', 'subCategoryDelete')->name('category.subCategory.delete');
        
    });
    Route::controller(BrandController::class)->group(function (){
        Route::get('/brand/list', 'index')->name('brand.list');
        Route::post('/brand/store', 'store')->name('brand.store');
        Route::post('/brand/update', 'update')->name('brand.update');
        Route::post('/brand/delete/{id}', 'delete')->name('brand.delete');
    });
    Route::controller(UnitController::class)->group(function (){
        Route::get('/unit/list', 'index')->name('unit.list');
        Route::post('/unit/store', 'store')->name('unit.store');
        Route::post('/unit/update', 'update')->name('unit.update');
        Route::post('/unit/delete/{id}', 'delete')->name('unit.delete');

    });
    Route::controller(ProductController::class)->group(function (){
        Route::get('/product/add', 'index')->name('product.add');
        Route::get('/product/list', 'list')->name('product.list');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/bulk-import', 'bulkImport')->name('product.bulkImport');
        Route::get('/product/bulk-export', 'bulkExport')->name('product.bulkExport');
        Route::post('/product/get-subcategories', 'getSubcategories')->name('product.get.subcategories');
        Route::post('/product/quantity-update', 'quantityUpdate')->name('product.quantity.update');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update', 'update')->name('product.update');
        Route::post('/product/delete/{id}', 'delete')->name('product.delete');
        Route::get('/product/barcode-generate/{id}', 'barcodeGenerate')->name('product.barcode.generate');
        Route::post('/product/import', 'import')->name('product.import');
    });

    Route::controller(StockController::class)->group(function (){
        Route::get('/stock/stock-limit', 'index')->name('stock.limit');
    });
    Route::controller(CouponController::class)->group(function (){
        Route::get('/coupon/add-new', 'index')->name('coupon.add');
        Route::post('/coupon/store', 'store')->name('coupon.store');
        Route::post('/coupon/status-update/{id}', 'statusUpdate')->name('coupon.status.update');
        Route::post('/coupon/delete/{id}', 'delete')->name('coupon.delete');
        Route::get('/coupon/edit/{id}', 'edit')->name('coupon.edit');
        Route::post('/coupon/update', 'update')->name('coupon.update');
    });
    Route::controller(AccountController::class)->group(function (){
        Route::get('/account/add', 'index')->name('account.add');
        Route::post('/account/store', 'store')->name('account.store');
        Route::get('/account/edit/{id}', 'edit')->name('account.edit');
        Route::post('/account/update', 'update')->name('account.update');
        Route::get('/account/list', 'list')->name('account.list');
        Route::post('/account/delete/{id}', 'delete')->name('account.delete');
        Route::get('/account/add-expense', 'addExpense')->name('account.addExpense');
        Route::get('/account/add-income', 'addIncome')->name('account.addIncome');
        Route::get('/account/add-transfer', 'addTransfer')->name('account.addTransfer');
        Route::get('/account/list-transaction', 'listTransaction')->name('account.listTransaction');

    });
    Route::controller(CustomerController::class)->group(function (){
        Route::get('/customer/add', 'index')->name('customer.add');
        Route::get('/customer/list', 'list')->name('customer.list');
        Route::post('/customer/store', 'store')->name('customer.store');
        Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
        Route::post('/customer/update', 'update')->name('customer.update');
        Route::post('/customer/delete/{id}', 'delete')->name('customer.delete');
        Route::post('/customer/addbalance', 'addBalance')->name('customer.addbalance');
        Route::get('/customer/view/{id}', 'view')->name('customer.view');
    });
    Route::controller(SupplierController::class)->group(function (){
        Route::get('/supplier/add', 'index')->name('supplier.add');
        Route::get('/supplier/list', 'list')->name('supplier.list');
    });
    Route::controller(SettingController::class)->group(function (){
        Route::get('/business-settings', 'index')->name('business.setting');
    });
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
