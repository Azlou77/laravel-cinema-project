<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WallController;
 
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
    return view('welcome');
});
 
Route::get('/dashboard',  [WallController::class, 'dashboard']
)->middleware(['auth'])->name('dashboard');

 Route::post('/postMessage',
    [WallController::class, 'postMessage']
)->middleware(['auth'])->name('postmessage');

Route::get('/deletemessage/{id}',
    [WallController::class, 'deletemessage']
)->middleware(['auth'])->name('deletemessage');

 
Route::get('/formUpdateMessage/{id}',
    [WallController::class, 'formUpdateMessage']
)->middleware(['auth'])->name('formupdatemessage');

 
Route::post('/updateMessage',
    [WallController::class, 'updateMessage']
)->middleware(['auth'])->name('updatemessage');

require __DIR__.'/auth.php';