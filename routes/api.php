<?php
use App\Models\Animal;
use App\Models\Dog;
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

Route::delete('/animal', function (Request $request) {
    $a = AnimalFactory::find($request->input());
    $a->delete();
});

Route::patch('/animal/{id}', function (Request $request, int $id) {
    $a = AnimalFactory::find($id);
    $a->update($request->input());
});

Route::patch('/dog/{id}', function (Request $request, int $id) {
    $d = Dog::findOrFail($id);
    $d->update($request->input());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
