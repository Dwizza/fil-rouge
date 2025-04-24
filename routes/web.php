<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParticulerController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ReportController;
use App\Models\annonce;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

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
Route::get('/',[ParticulerController::class, 'home'])->name('home');
route::get('/annonceDetails/{id}',[AnnonceController::class, 'annonceDetail'])->name('user.annonceDetail');
Route::get('/profile/view/{id}', [ParticulerController::class, 'viewProfile'])->name('user.profile.view');
route::get('/annoncesBy/{id}', [ParticulerController::class, 'annoncesByCategories'])->name('user.annoncesBy');


Route::middleware(['auth', 'checkRole:2'])->prefix('company')->group(function () {
    
    route::get('/', [AnnonceController::class, 'index'])->name('company.dashboard');
    // route::get('/profile', [EntrepriseController::class, 'index']);
    route::get('/annonces', [AnnonceController::class, 'annonces']);
    route::get('/allannonces', [entrepriseController::class, 'show'])->name('annonce.show');
    route::get('/addannonce', [AnnonceController::class, 'create'])->name('addannonce');
    route::post('/addannonce', [AnnonceController::class, 'store'])->name('addannoncepost');
    route::get('/editannonce/{annonce}', [AnnonceController::class, 'edit'])->name('editannonce');
    route::post('/editannonce/{annonce}', [AnnonceController::class, 'update'])->name('editannonce');
    route::post('/deleteannonce/{annonce}', [AnnonceController::class, 'destroy'])->name('deleteannonce');
    route::get('/profile', [AuthController::class, 'profile'])->name('company.profile');
    route::post('/profile', [AuthController::class, 'editProfile'])->name('editprofile');
    // messages
    route::get('/conversation',[EntrepriseController::class, 'conversations'])->name('entreprise.conversation');
    route::get('/chat/{user}', [MessageController::class, 'show'])->name('company.chat');
    route::post('/chat/send', [MessageController::class, 'store'])->name('chat.send_company');
    
    // billing
    route::get('/billing', [EntrepriseController::class, 'billing'])->name('company.billing');
    route::get('/billing/{id}', [EntrepriseController::class, 'changeStatusPayment'])->name('change.status.payment');
})->middleware('checkRole:2');


Route::middleware(['auth', 'checkRole:1'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/annonces', [AdminController::class, 'annonces']);
    Route::get('/users',[ AdminController::class, 'users'])->name('admin.users');
    Route::post('/annonces/{id}', [AdminController::class, 'updateStatus'])->name('updateStatus');

    //reports
    route::get('/reports', [ReportController::class, 'showReports'])->name('admin.reports');

});

//route particuler
Route::prefix('user')->middleware(['auth', 'checkRole:3'])->group(function() {
    
    // Dashboard
    Route::get('/dashboard', [ParticulerController::class, 'dashboard'])->name('user.dashboard');
    
    // Profil
    Route::get('/profile', [ParticulerController::class, 'profile'])->name('user.profile');
    Route::put('/profile', [ParticulerController::class, 'updateProfile'])->name('user.profile.update');
    route::get('/profile/edit', [ParticulerController::class, 'profile'])->name('user.profile.edit');
    route::post('/profile/edit/{id}', [ParticulerController::class, 'editProfile'])->name('user.profile.update');

    // Annonces
    Route::post('/annonces', [ParticulerController::class, 'store'])->name('user.annonces.store');
    Route::get('/annonce/{annonce}', [ParticulerController::class, 'edit'])->name('user.annonces.edit');
    Route::post('/annonce/{annonce}', [ParticulerController::class, 'update'])->name('user.annonces.update');
    Route::post('/annonce/delete/{annonce}', [ParticulerController::class, 'destroy'])->name('user.annonces.destroy');

    // Messages
    Route::get('/chat/{user}', [MessageController::class, 'index'])->name('chat');
    Route::post('/chat/send', [MessageController::class, 'store'])->name('chat.send');
    Route::get('/inbox', [MessageController::class, 'conversations'])->name('chat.inbox');

    //report
    Route::post('/report/{id}', [ReportController::class, 'create'])->name('user.report.create');

    //payment
    route::get('/checkout/{id}', [PaymentsController::class, 'payment'])->name('user.checkout');
    route::post('/payment/{id}', [PaymentsController::class, 'payment'])->name('user.payment');
    

});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
