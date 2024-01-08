<?php
use App\Http\Resources\Animal;
use App\Http\Resources\AnimalCollection;

use App\Libraries\AnimalFactory;

// use App\Models\Animal;
use App\Models\Dog;

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
  return new AnimalCollection(AnimalFactory::all());
});

Route::get('/animal/{id}', function (Request $request, int $id) {return new Animal(AnimalFactory::find($id));});

Route::put('/animal', function (Request $request) {
    return Animal::create($request->input());
});

Route::delete('/animal', function (Request $request) {
    $a = AnimalFactory::find($request->input());
    $a->delete();
});

Route::post('/animal/{id}', function (Request $request, int $id) {
    $a = AnimalFactory::find($id);
    return $a->update($request->input());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
