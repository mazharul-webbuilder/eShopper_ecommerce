<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Models\AdminProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;


//FrontEnd Routes

Route:: get('/', [EcommerceController::class, 'index'])->name('home');
Route:: get('/products/{id}', [EcommerceController::class, 'products'])->name('productbySubcategories');
Route:: get('/contacts', [EcommerceController::class, 'contact'])->name('contact');
Route:: post('/customer-inquiry', [EcommerceController::class, 'customerInquiry'])->name('customer.query');
Route:: get('/product-detail/{id}', [ProductController::class, 'detail'])->name('product-detail');


Route:: post('/cart-products/{id}', [CartController::class, 'adToCart'])->name('add-to-cart');
Route:: post('/cart-product/{id}', [CartController::class, 'remove'])->name('delete-cart-product');
Route:: get('/cart-products', [CartController::class, 'index'])->name('show-cart');
Route:: post('/update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');

Route:: get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route:: post('/new-order',[CheckoutController::class, 'newOrder'])->name('new-order');


Route::get('/customer-login', [CustomerController::class, 'login'])->name('customer.login')->middleware('customer');
Route::get('/customer-register', [CustomerController::class, 'register'])->name('customer.register')->middleware('customer');
Route::post('/new-customer-register', [CustomerController::class, 'newRegister'])->name('customer.new.register');
Route::get('/customer-dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard')->middleware('customerDashboard');
Route::get('/customer-logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::post('/customer-login-check', [CustomerController::class, 'loginCheck'])->name('customer.logincheck');
//End Frontend Route


//Admin Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/edit-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/add-sub-category', [SubCategoryController::class, 'add'])->name('subcategory.add');
    Route::post('/create-sub-category', [SubCategoryController::class, 'create'])->name('subCategory.create');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update'])->name('subCategory.update');
    Route::post('/delete-sub-category/{id}', [SubCategoryController::class, 'delete'])->name('subCategory.delete');
    Route::get('/manage-sub-category', [SubCategoryController::class, 'manage'])->name('subcategory.manage');

    Route::get('/add-brand', [BrandController::class, 'add'])->name('brand.add');
    Route::post('/create-brand', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage');

    Route::get('/add-unit', [UnitController::class, 'add'])->name('unit.add');
    Route::post('/create-unit', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::post('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route::get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage');

    Route::get('/get-sub-category-by-categoryID', [AdminProductController::class, 'getSubCategory'])->name('product.subCategory');
    Route::get('/add-product', [AdminProductController::class, 'add'])->name('product.add');
    Route::post('/create-product', [AdminProductController::class, 'create'])->name('product.create');
    Route::get('/edit-product/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::get('/detail-product/{id}', [AdminProductController::class, 'detail'])->name('product.detail');
    Route::post('/update-product/{id}', [AdminProductController::class, 'updateProduct'])->name('product.update');
    Route::get('/manage-product', [AdminProductController::class, 'manage'])->name('product.manage');

    Route::get('/order-detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/order-edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order-update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/order-invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
    Route::get('/order-print/{id}', [OrderController::class, 'printInvoice'])->name('order.print');
    Route::get('/manage-order', [OrderController::class, 'mange'])->name('order.manage');
    Route::post('/delete-order/{id}', [OrderController::class, 'delete'])->name('order.delete');


});
