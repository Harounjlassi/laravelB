<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/category/all', [CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class,'AddCat'])->name('store.category');
Route::get('categorie/edit/{id}', [CategoryController::class,'EditCat']);
Route::post('category/update/{id}', [CategoryController::class,'Update']);
Route::get('softdelete/category/{id}', [CategoryController::class,'softDelate']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        //$users=User::all();
        $users=DB::table('users')->get();

        return view('dashboard',compact('users') );
    })->name('dashboard');
});
