<?php

use App\Models\Notes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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
    return view('index');
});

Route::get('/notes', function(){

    $notes = Notes::simplePaginate(3);

    return view('notes.index')->with('notes', $notes);

})->name('notes');

Route::get('/note/create', function(){
    return view('notes.create');
})->name('note.create');

Route::get('note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::get('note/delete/{note}', [NoteController::class, 'destroy'])->name('note.delete');
Route::post('note/{note}', [NoteController::class, 'update'])->name('note.update');
Route::get('note/complete/{note}', [NoteController::class, 'complete']);

Route::get('/note/{note}', [NoteController::class,'show'])->name('note');



Route::post('/note/store', [NoteController::class,'store'])->name('note.store');

