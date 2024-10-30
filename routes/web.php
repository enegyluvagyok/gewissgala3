<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\FighterController;
use App\Http\Controllers\FightController;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/streaming', function () {
    return view('streaming');
});
Route::get('/fighters', [FighterController::class, 'index']);
Route::get('/fighters/{id}', [FighterController::class, 'show'])->name('fighters.show');

Route::get('/fight_cards', [FightController::class, 'index'])->name('fight_cards.index');
Route::get('/gewisstraining', function () {
    return view('gewisstraining');
});