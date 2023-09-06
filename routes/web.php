<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\apiAdresseController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ErreurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// HomeController

Route::get('/home', [HomeController::class, 'index']);
Route::get('/à-propos-de-nous', [HomeController::class, 'a_propos_de_nous']);

// MenuController
Route::get('/nos-menus', [MenuController::class, 'index']);

// UserController GET
Route::get('/register', [UserController::class, 'register_view'])->name('register');

// UserController POST
Route::post('/create-account', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);




//PDFController
Route::get('/commande/{id}', [PDFController::class, 'show']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    //AdminController
    Route::get('/dashboard', [AdminController::class, 'index']);

    //ProduitController
    Route::get('/ajouter-produit', [ProduitController::class, 'addProduit_view']);
    Route::get('/tous-les-produits', [ProduitController::class, 'index']);

    Route::get('/editer-produit/{id}', [ProduitController::class, 'edit_produit_view']);
    Route::get('/delete-produit/{id}', [ProduitController::class, 'delete_produit']);

    Route::post('/addProduit', [ProduitController::class, 'addProduit']);
    Route::post('/editProduit/{id}', [ProduitController::class, 'editProduit']);
    Route::get('/update-produit-homepage/{id}', [ProduitController::class, 'update_produit_homepage']);
    Route::get('/update-produit-status/{id}', [ProduitController::class, 'update_produit_status']);

    //CategoriesController
    Route::get('/ajouter-categorie', [CategoriesController::class, 'addcategorie_view']);
    Route::get('/toutes-les-categories', [CategoriesController::class, 'index']);
    Route::get('/editer-categorie/{id}', [CategoriesController::class, 'edit_categorie_view']);
    Route::get('/delete-categorie/{id}', [CategoriesController::class, 'delete_categorie']);

    Route::post('/edit-categorie/{id}', [CategoriesController::class, 'edit_categorie']);
    Route::post('/add-categorie', [CategoriesController::class, 'addcategorie']);

    //OrdersController
    Route::get('/toutes-les-commandes', [OrdersController::class, 'index']);
    Route::post('/update-status-order/{id}', [OrdersController::class, 'update_status_order']);
});


//PanierController
Route::get('/mon-panier', [PanierController::class, 'index']);
Route::get('/ajouter-au-panier/{id}', [PanierController::class, 'add_to_panier']);
Route::get('/supprimer-du-panier/{id}', [PanierController::class, 'delete_item_to_panier']);
Route::post('/update-qty-item/{id}', [PanierController::class, 'modifier_qty']);

Route::group(['middleware' => ['auth' , 'checkRole:client']], function () {
    //StripeController
    Route::post('/checkout', [StripeController::class, 'checkout']);
    Route::get('/checkout/success', [StripeController::class, 'checkout_success']);
    Route::get('/checkout/error', [StripeController::class, 'checkout_error']);

    // ClientController
    Route::get('/mon-compte', [ClientController::class, 'index']);
    Route::get('/ajouter-adresse', [ClientController::class, 'address_view']);
    Route::get('/mes-commandes', [ClientController::class, 'orders_view']);
    Route::get('/insert-long-lat', [ClientController::class, 'insertlonglat']);
    Route::get('/delete-adresse/{id}', [ClientController::class, 'delete_adresse']);
    Route::get('/mettre-un-avis', [ClientController::class, 'avis_view']);

    Route::post('/add-adresse', [ClientController::class, 'add_address']);
    Route::post('/add-long-lat/{id}', [ClientController::class, 'add_long_lat']);
    Route::post('/insert-avis', [ClientController::class, 'insert_avis']);

});
    //UserController
    Route::get('/logout', [UserController::class, 'logout']);


    Route::get('/404', [ErreurController::class, 'erreur404']);
