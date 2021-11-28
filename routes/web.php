<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Models\Recipe;

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
    $recipes = Recipe::orderByDesc('created_at')->limit('9')->paginate('3');
    $categories = Category::orderBy('id')->limit('10')->get();
    // dd($categories);
    $array_variables = ['categories'=>$categories,'recipes'=>$recipes];
    return view('portada.welcome',$array_variables);
});

Auth::routes();
Route::get('users/{user}/myrecipes',[UserController::class,'myrecipes'])->name('users.myrecipes');
//Redirige las vistas de user
Route::resource('users', UserController::class);
Route::resource('recipes', RecipeController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/filtrado/{category}',[CategoryController::class,'categories'])->name('category.index');
Route::get('/search',[RecipeController::class,'search'])->name('searchs.show');

