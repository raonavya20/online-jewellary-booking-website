<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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



/*------------------------------------backend--------------------*/


Route::get('dashboard', [AdminController::class, 'dashboard']);
Route::get('login', [AdminController::class, 'login']);
Route::get('about', [AdminController::class, 'about']);
Route::get('goals', [AdminController::class, 'goals']);
Route::get('gallery', [AdminController::class, 'gallery']);
Route::get('category', [AdminController::class, 'category']);
Route::get('subcategory', [AdminController::class, 'subcategory']);
Route::get('products', [AdminController::class, 'products']);
Route::get('bookings', [AdminController::class, 'bookings']);
Route::get('password', [AdminController::class, 'password']);


Route::post('admin_login', [AdminController::class, 'admin_login']);
Route::get('logout', [AdminController::class, 'logout']);

Route::post('bookingFetch', [AdminController::class, 'bookingFetch']);
Route::post('categoryFetch', [AdminController::class, 'categoryFetch']);
Route::post('subcategoryFetch', [AdminController::class, 'subcategoryFetch']);
Route::post('galleryFetch', [AdminController::class, 'galleryFetch']);
Route::post('productFetch', [AdminController::class, 'productFetch']);
Route::post('password_verify', [AdminController::class, 'password_verify']);

Route::post('aboutFetch', [AdminController::class, 'aboutFetch']);
Route::post('goalsFetch', [AdminController::class, 'goalsFetch']);

Route::get('loadSubcategory', [AdminController::class, 'loadSubcategory']);

Route::get('editProduct', [AdminController::class, 'editProduct']);
Route::get('deleteProduct', [AdminController::class, 'deleteProduct']);
Route::get('deleteCategory', [AdminController::class, 'deleteCategory']);
Route::get('editCategory', [AdminController::class, 'editCategory']);
Route::get('deletesubcategory', [AdminController::class, 'deletesubcategory']);
Route::get('editsubcategory', [AdminController::class, 'editsubcategory']);
Route::get('editImage', [AdminController::class, 'editImage']);
Route::get('deleteImage', [AdminController::class, 'deleteImage']);
Route::get('deleteOrder', [AdminController::class, 'deleteOrder']);
Route::get('invoice_bk', [AdminController::class, 'invoice_bk']);


/*------------------------------------frontend--------------------*/

Route::get('/', [WebController::class, 'home']);
Route::get('aboutus', [WebController::class, 'aboutus']);
Route::get('ourproducts', [WebController::class, 'ourproducts']);
Route::get('booknow', [WebController::class, 'booknow']);
Route::get('contactus', [WebController::class, 'contactus']);
Route::get('register', [WebController::class, 'register']);
Route::get('customerlogin', [WebController::class, 'customerlogin']);
Route::get('customerprofile', [WebController::class, 'customerprofile']);
Route::get('customerorders', [WebController::class, 'customerorders']);
Route::get('invoice', [WebController::class, 'invoice']);


Route::post('cust_login', [WebController::class, 'cust_login']);
Route::get('cust_logout', [WebController::class, 'cust_logout']);

Route::post('registerUpdate', [WebController::class, 'registerUpdate']);
Route::get('buynow', [WebController::class, 'buynow']);
Route::post('orderFetch', [WebController::class, 'orderFetch']);
Route::post('profile_update', [WebController::class, 'profile_update']);


