<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\FighterController;
use App\Http\Controllers\FightController;
use App\Models\Fighter;
use App\Models\Fight;
use App\Models\LinkWidget;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/streaming', function () {
    return view('streaming');
});
Route::get('/fighters', [FighterController::class, 'index']);
Route::get('/fighters/{id}', [FighterController::class, 'show'])->name('fighters.show');

Route::get('/fight_cards', [FightController::class, 'index'])->name('fight_cards.index');
Route::get('/team', function () {
    return view('team');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/gala', function () {
    return view('gala')->with('fighters', Fighter::orderBy('name')->get())->with('fights', Fight::all()->sortByDesc('date'));
});

Route::get('/team', function () {
    return view('team');
});
Route::get('/media', function () {
    $widgets = LinkWidget::query()->where('is_active', true)->orderBy('sort')->orderByDesc('id')->get();
    return view('media')->with('widgets', $widgets);
});
Route::get('/donate', function () {
    return view('donate');
});