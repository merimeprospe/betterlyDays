<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\PostulantController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\MessagerisController;
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

Route::get('/', function () {
    if(auth()->guest()){
        return view('welcome');
    }
    return redirect()->intended(RouteServiceProvider::HOME);
});

Route::get('/dashboard', function () {     
    if(Gate::allows('access-admin')){
        return redirect()->intended(RouteServiceProvider::HOME2);
    }
    else{
        return redirect()->intended(RouteServiceProvider::HOME1);
    }

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

route::middleware(['admin','active'])->group(function (){
    Route::get('/dshboard_admin', [adminController::class, 'admin'])->name('dshboard_admin');
    Route::get('/liste_vacancier', [adminController::class, 'liste_vacancier'])->name('liste_v');
    Route::get('/liste_organisation', [adminController::class, 'liste_organisation'])->name('liste_o');
    Route::get('/liste_post', [adminController::class, 'liste_post'])->name('liste_p');
    Route::get('/liste_admin', [adminController::class, 'liste_admin'])->name('liste_a');
    Route::get('/new_admin', [adminController::class, 'new_admin'])->name('new_admin');
    Route::get('/sup/{id}', [adminController::class, 'sup'])->name('suppre');
    Route::get('/bloquer/{id}', [adminController::class, 'bloquer'])->name('bloquer');
    Route::get('/debloquer/{id}', [adminController::class, 'debloquer'])->name('debloquer');
    Route::post('register_admin', [adminController::class, 'store'])->name('register_admin');
    Route::get('recherche_admin', [adminController::class, 'search'])->name('recher');
});

route::middleware(['notadmin','active'])->group(function (){

    Route::get('/dashboard_user', [Postcontroller::class, 'posts'])->name('posts');    
    
    Route::post('/store', [Postcontroller::class, 'store'])->name('post');
    Route::post('/com', [CommentaireController::class, 'store'])->name('post_com');
    Route::get('supprime/{id}', [Postcontroller::class, 'supprime'])->name('sup');
    Route::get('modifier/{id}', [Postcontroller::class, 'modifier'])->name('mod');
    Route::get('Telecharger/{id}', [Postcontroller::class, 'download'])->name('telecha');
    Route::get('organisations', [Postcontroller::class, 'organisations'])->name('organisations');

    Route::get('my_profile', [ProfileController::class, 'my_profile'])->name('my_profile');
    route::get('profile/{id}', [ProfileController::class, 'profile'])->name('profile');
    Route::post('font_image', [ProfileController::class, 'font'])->name('font');
    Route::post('image_profil', [ProfileController::class, 'image_p'])->name('image_p');
    Route::post('competence', [ProfileController::class, 'competence'])->name('comp');
    Route::post('profile', [ProfileController::class, 'store'])->name('edite'); 
    Route::get('my_organisation', [ProfileController::class, 'my_organisation'])->name('my_organisation');
    Route::get('organisation/{id}', [ProfileController::class, 'organisation'])->name('organisation');
    Route::get('about', [ProfileController::class, 'about'])->name('about');
    Route::get('postuler/{id}', [PostulantController::class, 'store'])->name('postuler');
    Route::post('note/{id}', [PostulantController::class, 'note'])->name('note');
    Route::get('postulant', [PostulantController::class, 'potulant'])->name('potulant');
    Route::get('retenu/{id}', [PostulantController::class, 'retenu'])->name('retenu');
    Route::get('changer/{id}', [PostulantController::class, 'changer'])->name('changer');
    Route::get('refuser/{id}', [PostulantController::class, 'refuser'])->name('refuser');
    Route::get('conversation', [MessagerisController::class, 'index'])->name('conversation');
    Route::get('conversation/{id}', [MessagerisController::class, 'show'])->name('show');
    Route::post('message/{id}', [MessagerisController::class, 'store'])->name('messag');
    Route::get('ajour/{id}', [MessagerisController::class, 'ajour'])->name('ajour');
    Route::get('recherche', [PostulantController::class, 'search'])->name('recherche');
    Route::get('recherche1', [PostulantController::class, 'search1'])->name('recherche1');
       
});

