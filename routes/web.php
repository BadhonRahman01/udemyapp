<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/contacts', function () {
//     return view('contacts.index');
// })->name('contacts.index');
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{id}', function ($id) {
//     $contact = App\Models\Contact::find($id);
//     return view('contacts.show', compact('contact'));
// })->name('contacts.show');

// Route::post('/contacts/{id}', function ($id) {
//     $contact = App\Models\Contact::find($id);
//     return view('contacts.store', compact('contact'));
// })->name('contacts.store');


// Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');


// Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


