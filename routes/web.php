<?php

use Illuminate\Support\Facades\Route;
use App\Http\livewire\HomeComponent;
use App\Http\livewire\ShopComponent;
use App\Http\livewire\CheckoutComponent;
use App\Http\livewire\ContactComponent;
use App\Http\livewire\User\UserDashboardComponent;
use App\Http\livewire\Admin\AdminDashboardComponent;
use App\Http\livewire\CategoryComponent;





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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/checkout', CheckoutComponent::class);

Route::get('/contact', ContactComponent::class);

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');




Route::middleware(['auth:sanctum', 'verified'])->group(function()
{
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function()
{
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
