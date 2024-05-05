<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminecommController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
//     return view('AdminHome');
// });
// Route::get('/', [AdminecommController::class,'AdminHome'])->middleware('CheckUserRole:admin');
Route::get('/', [AdminecommController::class,'AdminHome']);

Route::get('AllProducts', [AdminecommController::class,'AllProducts']);
Route::get('/addproduct', [AdminecommController::class,'AddProduct']);
Route::get('editproduct/{productid?}', [AdminecommController::class,'EditProduct'])->middleware('CheckUserRole:admin,salesman');
Route::post('storeproduct',[AdminecommController::class,'StoreProduct']);
Route::get('removeproduct/{productid?}',[AdminecommController::class,'RemoveProduct'])->middleware('CheckUserRole:admin');


Route::get('addproductimages/{productid}',[AdminecommController::class,'AddProductImages'])->middleware('CheckUserRole:admin,salesman');
Route::get('removeproductphoto/{productid}', [AdminecommController::class, 'RemoveProductPhoto'])->name('removeproductphoto');

Route::post('storeproductimage',[AdminecommController::class,'StoreProductImage'])->name('storeproductimage');

Route::get('charts',[AdminecommController::class,'Charts'])->middleware('CheckUserRole:admin,salesman');
Route::get('bills',[AdminecommController::class,'Bills']);
Route::get('reviews',[AdminecommController::class,'Reviews']);
Route::get('/cancelled/{id}',[AdminecommController::class,'cancelledBills'])->middleware('CheckUserRole:admin');
Route::get('/delete_cust/{id}',[AdminecommController::class,'DeleteOpinion'])->middleware('CheckUserRole:admin');











   Route::post('/lang',function(Request $request){
    Session::put('locale',$request->locale);
    return redirect()->back();

})->name('ChangeLanguage');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
