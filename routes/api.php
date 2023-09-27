<?php
use App\Models\Animal;
use App\Http\Resources\AnimalCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/animals', function (Request $request) {
    return new AnimalCollection(Animal::all());
});

Route::put('/animal', function (Request $request) {
    return Animal::create($request->input());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
